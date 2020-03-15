using System;
using System.IO;

using System.Linq;
using System.Text.Json;
using System.Text.Json.Serialization;
using System.Collections.Generic;

namespace console
{
    class Program
    {
        
        static bool isRunning = true;
        static void Main(string[] args)
        {

            while (Program.isRunning)
            {
                showChoices();
            }
        }
        static void showChoices()
        {
            IEnumerable<Account> accounts;

            System.Console.Write(
            "1) Get all accounts\n" +
            "2) Get account by account number\n" +
            "3) Search\n" +
            "4) Move money from Account to Account\n" +
            "0) exit\n"

            );
            switch (System.Console.ReadLine())
            {
                case "1":
                accounts = GetAccounts();
                    
                    System.Console.WriteLine(AccountFormater(accounts.ToList()));
                
                    break;

                case "2" : 
                        System.Console.WriteLine("Please enter account number");
                        var ownerSearch =  System.Console.ReadLine();
                        accounts = (GetAccounts()).ToList();
                        foreach(var account in accounts){
                            if(account.Number.ToString().Equals(ownerSearch)){
                                System.Console.WriteLine(
                                    AccountFormater(new List<Account>{account})
                                    );
                            }
                            }
                        break;
                case "3":
                System.Console.WriteLine("Please enter a search string");
                string searchString = System.Console.ReadLine();
                List<Account> results = SearchAccounts(searchString);
                System.Console.WriteLine(AccountFormater(results));
                break;
                case "4":
                    System.Console.WriteLine("Please enter account number for from-account");
                    string fromAccountNumber = System.Console.ReadLine();
                    Account fromAccount = AccountSelector(fromAccountNumber);
                    if(fromAccount == null) {System.Console.WriteLine("invalid account number");return;}
                    System.Console.WriteLine("Please enter account number for to-account");
                    string toAccountNumber = System.Console.ReadLine();
                    Account toAccount = AccountSelector(toAccountNumber);
                    if(toAccount == null) {System.Console.WriteLine("invalid account number");return;}
                    int maxSum = fromAccount.Balance;
                    System.Console.WriteLine("Please enter sum, a maximum of: " + 
                     maxSum + " can be sent");
                    int sum = Int16.Parse(System.Console.ReadLine());
                    if(sum > 0 && sum < maxSum){
                        fromAccount.Balance -= sum;
                        toAccount.Balance += sum;
                        saveAccount(fromAccount);
                        saveAccount(toAccount);
                    }
                    break;
                case "0":
                    Program.isRunning = false;
                    break;
            }
        }
        static IEnumerable<Account> GetAccounts()
        {
            String file = "../data/account.json";

            using (StreamReader reader = new StreamReader(file))
            {
                string data = reader.ReadToEnd();

                var json = JsonSerializer.Deserialize<Account[]>(
                    data,
                    new JsonSerializerOptions
                    {
                        PropertyNameCaseInsensitive = true
                    }
                );

                return json;
            }
        }
        static void SetAccounts(IEnumerable<Account> accounts)
        {
            String file = "../data/account.json";
            string jsonString = JsonSerializer.Serialize(accounts);
            File.WriteAllText(file, jsonString);
        }
        static Account AccountSelector(String number){
            try{
            return GetAccounts().FirstOrDefault(account => account.Number.ToString().Equals(number));
            } catch(System.NullReferenceException e){
                System.Console.WriteLine("invalid account number");
                return null;
            }
        }
        static List<Account> SearchAccounts(string searchString){
            List<Account> accountList = (GetAccounts()).ToList();
            return accountList.FindAll(delegate(Account account){
                        if (account.Number.ToString().Equals(searchString) 
                        || account.Label.ToString().Contains(searchString)
                        || account.Owner.ToString().Contains(searchString))
                            return true;
                        else return false;
                });
        }

        static void saveAccount(Account accountToSave){
            List<Account> accountList = GetAccounts().ToList();
            accountList.Where(account => account.Number == accountToSave.Number).ToList().ForEach(element => element.Balance = accountToSave.Balance);
            SetAccounts(accountList);
        }
        static string AccountFormater(List<Account> accounts){
                   
                string fancyString =
                    "+--------+---------+-----------+-------+\n"+
                    "| Number | Balance |   Label   | Owner |\n"+
                    "+--------+---------+-----------+-------+\n";
                    foreach(var account in accounts)
                        fancyString += account.toPrettyString();
                    fancyString += 
                    "+--------+---------+-----------+-------+\n";
                    return fancyString;
        }
        }
    }
        public class Account
    {
        public int Number { get; set; }
        public int Balance { get; set; }
        public string Label { get; set; }
        public int Owner { get; set; }
        
        public override string ToString() {
            return JsonSerializer.Serialize<Account>(this);
        }

        public string toPrettyString(){
            return String.Format("| {0,6} | {1,7} | {2,9} | {3,5} |\n", Number, Balance, Label, Owner);
        }

        
}
