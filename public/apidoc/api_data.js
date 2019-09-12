define({ "api": [
  {
    "type": "post",
    "url": "api/1.0.0/purchase",
    "title": "计划方案查找",
    "name": "purchase",
    "group": "GroupNamea",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "cust_id",
            "description": "<p>用户id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/purchase"
      }
    ],
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败返回:",
          "content": "HTTP/1.1 404 Not Found\n{\n  \"error\": \"请求失败\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1_0/PurchaseController.php",
    "groupTitle": "计划方案管理"
  },
  {
    "type": "post",
    "url": "api/1.0.0/purcview",
    "title": "计划方案查找单条",
    "name": "purcview",
    "group": "GroupNamea",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "planid",
            "description": "<p>计划方案id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/purcview"
      }
    ],
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败返回:",
          "content": "HTTP/1.1 404 Not Found\n{\n  \"error\": \"请求失败\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1_0/PurchaseController.php",
    "groupTitle": "计划方案管理"
  },
  {
    "type": "post",
    "url": "api/1.0.0/paylog",
    "title": "缴费记录查找",
    "name": "paylog",
    "group": "GroupNameb",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "cust_id",
            "description": "<p>用户id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/paylog"
      }
    ],
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败返回:",
          "content": "HTTP/1.1 404 Not Found\n{\n  \"error\": \"请求失败\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1_0/PaylogController.php",
    "groupTitle": "缴费记录管理"
  },
  {
    "type": "get",
    "url": "api/1.0.0/konwledge",
    "title": "营销知识查找",
    "name": "konwledge",
    "group": "GroupNamec",
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/konwledge"
      }
    ],
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败返回:",
          "content": "HTTP/1.1 404 Not Found\n{\n  \"error\": \"请求失败\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1_0/KonwledgeController.php",
    "groupTitle": "营销知识库管理"
  },
  {
    "type": "post",
    "url": "api/1.0.0/delegate",
    "title": "派遣查找",
    "name": "delegate",
    "group": "GroupNamed",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "hous_id",
            "description": "<p>职业顾问id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/delegate"
      }
    ],
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败返回:",
          "content": "HTTP/1.1 404 Not Found\n{\n  \"error\": \"请求失败\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1_0/DelegateController.php",
    "groupTitle": "派遣管理"
  },
  {
    "type": "post",
    "url": "api/1.0.0/deleview",
    "title": "派遣查找单条",
    "name": "deleview",
    "group": "GroupNamed",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "gate_id",
            "description": "<p>派遣id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/deleview"
      }
    ],
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败返回:",
          "content": "HTTP/1.1 404 Not Found\n{\n  \"error\": \"请求失败\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1_0/DelegateController.php",
    "groupTitle": "派遣管理"
  },
  {
    "type": "post",
    "url": "api/1.0.0/trackinfo",
    "title": "客户跟踪查找",
    "name": "delegate",
    "group": "GroupName",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "hous_id",
            "description": "<p>职业顾问id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/trackinfo"
      }
    ],
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败返回:",
          "content": "HTTP/1.1 404 Not Found\n{\n  \"error\": \"请求失败\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1_0/TrackinfoController.php",
    "groupTitle": "客户跟踪管理"
  },
  {
    "type": "post",
    "url": "api/1.0.0/coowner",
    "title": "房屋共有人查找",
    "name": "coowner",
    "group": "GroupNamef",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "cust_id",
            "description": "<p>用户id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/coowner"
      }
    ],
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败返回:",
          "content": "HTTP/1.1 404 Not Found\n{\n  \"error\": \"请求失败\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1_0/CoownerController.php",
    "groupTitle": "房屋共有人管理"
  },
  {
    "type": "post",
    "url": "api/1.0.0/buyinfo",
    "title": "认购管理",
    "name": "buyinfo",
    "group": "GroupNameg",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "sponsor",
            "description": "<p>职业顾问id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/buyinfo"
      }
    ],
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败返回:",
          "content": "HTTP/1.1 404 Not Found\n{\n  \"error\": \"请求失败\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1_0/BuyinfoController.php",
    "groupTitle": "认购签约"
  },
  {
    "type": "get",
    "url": "api/1.0.0/cultrue",
    "title": "企业文化查找",
    "name": "cultrue",
    "group": "GroupNameh",
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/cultrue"
      }
    ],
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败返回:",
          "content": "HTTP/1.1 404 Not Found\n{\n  \"error\": \"请求失败\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1_0/CultrueController.php",
    "groupTitle": "企业文化管理"
  },
  {
    "type": "post",
    "url": "1.0.0/login",
    "title": "职业顾问登录",
    "name": "__",
    "group": "登录管理",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "mobile",
            "description": "<p>职业顾问手机号</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "password",
            "description": "<p>职业顾问密码</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/login"
      }
    ],
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "失败返回:",
          "content": "HTTP/1.1 404 Not Found\n{\n  \"error\": \"请求失败\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/V1_0/LoginController.php",
    "groupTitle": "登录管理"
  }
] });
