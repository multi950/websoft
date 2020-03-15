using System.Collections.Generic;
using Microsoft.AspNetCore.Mvc;
using webapp.Models;
using webapp.Services;

namespace webapp.Controllers
{
    [ApiController]
    [Route("api/[controller]")]
    public class TransactionController : ControllerBase
    {
        public TransactionController(JsonFileAccountService accountService)
        {
            AccountService = accountService;
        }

        public JsonFileAccountService AccountService { get; }

        [HttpPut]
        public string Put(int from, int amount, int to)
        {

           Account fromAccount = AccountService.GetAccount(from);
           Account toAccount = AccountService.GetAccount(to);

            if(fromAccount.Balance < amount)
                return null;
            fromAccount.Balance -= amount;
            toAccount.Balance += amount;
            AccountService.SaveAccount(fromAccount);
            AccountService.SaveAccount(toAccount);

            string data = (from + " " +to + " " +amount + " " );
            System.Console.WriteLine(data);
            
            return "success";
        }

    
}

        
    }