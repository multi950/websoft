using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text.Json;
using System.Text.Json.Serialization;
using Microsoft.AspNetCore.Hosting;
using webapp.Models;

namespace webapp.Services
{
    public class JsonFileAccountService
    {
        public JsonFileAccountService(IWebHostEnvironment webHostEnvironment)   //constructor that takes some webhosting info
        {
            WebHostEnvironment = webHostEnvironment;
        }

        public IWebHostEnvironment WebHostEnvironment { get; }

        private string JsonFileName //Path builder
        {
            get { return Path.Combine(WebHostEnvironment.ContentRootPath, "..", "data", "account.json"); }
        }

        public IEnumerable<Account> GetAccounts()   //Load the account-json
        {
            using (var jsonFileReader = File.OpenText(JsonFileName))
            {
                return JsonSerializer.Deserialize<Account[]>(jsonFileReader.ReadToEnd(),
                    new JsonSerializerOptions
                    {
                        PropertyNameCaseInsensitive = true
                    });
            }
        }

        public Account GetAccount(int number){
            foreach(Account account in GetAccounts()){
                if(account.Number == number)
                return account;
            }
            return null;
        }
    }
}
