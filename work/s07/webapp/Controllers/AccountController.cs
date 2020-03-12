using System.Collections.Generic;
using Microsoft.AspNetCore.Mvc;
using webapp.Models;
using webapp.Services;

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
        public Account Get(int number)
        {
            return AccountService.GetAccount(number);
        }
    }
}
