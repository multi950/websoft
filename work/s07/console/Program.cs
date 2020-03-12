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
            "0) exit\n"

            );
            switch (System.Console.ReadLine())
            {
                case "1":
                accounts = ReadAccounts();
                    
                    System.Console.WriteLine(AccountFormater(accounts.ToList()));
                
                    break;

                case "2" : 
                        System.Console.WriteLine("Please enter account number");
                        var ownerSearch =  System.Console.ReadLine();
                        accounts = (ReadAccounts()).ToList();
                        foreach(var account in accounts){
                            if(account.Number.ToString().Equals(ownerSearch)){
                                System.Console.WriteLine(
                                    AccountFormater(new List<Account>{account})
                                    );
                            }
                            }
                        
                        
                break;
                case "0":
                    Program.isRunning = false;
                    break;
            }
        }
        static IEnumerable<Account> ReadAccounts()
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
