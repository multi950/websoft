using System.Collections.Generic;
using Microsoft.AspNetCore.Mvc;
using webapp.Models;
using webapp.Services;
using System.Text;
using System.Text.Json.Serialization;
using System.Text.Json;

namespace webapp.Controllers
{
    [ApiController]
    [Route("api/[controller]/{number}")]
    public class AccountController : ControllerBase
    {
        public AccountController(JsonFileAccountService accountService)
        {
            AccountService = accountService;
        }

        public JsonFileAccountService AccountService { get; }

        [HttpGet]
        public string Get(int number)
        {
            Account account = AccountService.GetAccount(number);
            if(account == null)
                return  "{\"Code\" : 404, \"Message\" : \"Not Found\"}";
            else return account.ToString();

        }
    }

}
    public class ErrorJson{
        int code;
        string message;
        public ErrorJson(int code, string message){
            this.code = code;
            this.message = message;
        }    
        
    public override string ToString() {
            return JsonSerializer.Serialize<ErrorJson>(this);
        }
}
        
        