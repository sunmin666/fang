define({ "api": [
  {
    "type": "post",
    "url": "1.0.0/login",
    "title": "登录",
    "name": "login",
    "group": "GroupLogin",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "mobile",
            "description": "<p>客户姓名</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "password",
            "description": "<p>手机号</p>"
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
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n}",
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
    "groupTitle": "ipad-登录"
  },
  {
    "type": "get",
    "url": "1.0.0/apartment",
    "title": "关注户型",
    "name": "apartment",
    "group": "GroupName",
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/apartment"
      }
    ],
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n}",
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
    "filename": "app/Http/Controllers/Api/V1_0/CustController.php",
    "groupTitle": "ipad-客户管理"
  },
  {
    "type": "post",
    "url": "api/1.0.0/purchase",
    "title": "客户置业计划方案查找",
    "name": "purchase",
    "group": "GroupNamea",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "hous_id",
            "description": "<p>职业顾问id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "page",
            "description": "<p>页码</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/purchase"
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
    "groupTitle": "置业计划方案管理"
  },
  {
    "type": "post",
    "url": "api/1.0.0/purdetails",
    "title": "客户置业计划方案详情",
    "name": "purdetails",
    "group": "GroupNamea",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "cust_id",
            "description": "<p>客户id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/purdetails"
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
    "groupTitle": "置业计划方案管理"
  },
  {
    "type": "post",
    "url": "api/1.0.0/purinsert",
    "title": "客户置业计划方案添加",
    "name": "purinsertv",
    "group": "GroupNamea",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "cust_id",
            "description": "<p>客户id</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "type",
            "description": "<p>付款方案</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "homeid",
            "description": "<p>房源id</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "programme",
            "description": "<p>方案</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "once_total",
            "description": "<p>一次性付款总价</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "years",
            "description": "<p>按揭时年限</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "month_price",
            "description": "<p>按揭月供</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "month_total",
            "description": "<p>按揭总价</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/purinsert"
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
    "groupTitle": "置业计划方案管理"
  },
  {
    "type": "get",
    "url": "1.0.0/area",
    "title": "客户区域",
    "name": "area",
    "group": "GroupName",
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/area"
      }
    ],
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n}",
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
    "filename": "app/Http/Controllers/Api/V1_0/CustController.php",
    "groupTitle": "ipad-客户管理"
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
    "type": "post",
    "url": "api/1.0.0/payview",
    "title": "缴费记录查找",
    "name": "payview",
    "group": "GroupNameb",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "payl_id",
            "description": "<p>缴费记录id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/payview"
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
    "type": "get",
    "url": "1.0.0/cognition",
    "title": "认知渠道",
    "name": "cognition",
    "group": "GroupName",
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/cognition"
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
    "filename": "app/Http/Controllers/Api/V1_0/CustController.php",
    "groupTitle": "ipad-客户管理"
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
    "type": "get",
    "url": "1.0.0/demand",
    "title": "客户意向等级",
    "name": "demand",
    "group": "GroupName",
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/demand"
      }
    ],
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n}",
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
    "filename": "app/Http/Controllers/Api/V1_0/CustController.php",
    "groupTitle": "ipad-客户管理"
  },
  {
    "type": "post",
    "url": "1.0.0/details",
    "title": "客户详情",
    "name": "details",
    "group": "GroupName",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "cust_id",
            "description": "<p>客户id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/details"
      }
    ],
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n}",
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
    "filename": "app/Http/Controllers/Api/V1_0/CustController.php",
    "groupTitle": "ipad-客户管理"
  },
  {
    "type": "get",
    "url": "1.0.0/family_str",
    "title": "家庭结构",
    "name": "family_str",
    "group": "GroupName",
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/family_str"
      }
    ],
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n}",
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
    "filename": "app/Http/Controllers/Api/V1_0/CustController.php",
    "groupTitle": "ipad-客户管理"
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
    "type": "get",
    "url": "1.0.0/first_contact",
    "title": "首次接触方式",
    "name": "first_contact",
    "group": "GroupName",
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/first_contact"
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
    "filename": "app/Http/Controllers/Api/V1_0/CustController.php",
    "groupTitle": "ipad-客户管理"
  },
  {
    "type": "get",
    "url": "1.0.0/floor_like",
    "title": "楼层偏好",
    "name": "floor_like",
    "group": "GroupName",
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/floor_like"
      }
    ],
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n}",
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
    "filename": "app/Http/Controllers/Api/V1_0/CustController.php",
    "groupTitle": "ipad-客户管理"
  },
  {
    "type": "get",
    "url": "1.0.0/furniture_need",
    "title": "家具需求",
    "name": "furniture_need",
    "group": "GroupName",
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/furniture_need"
      }
    ],
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n}",
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
    "filename": "app/Http/Controllers/Api/V1_0/CustController.php",
    "groupTitle": "ipad-客户管理"
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
    "type": "post",
    "url": "1.0.0/get/cust",
    "title": "客户列表",
    "name": "get_cust",
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
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "page",
            "description": "<p>页码</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/get/cust"
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
    "filename": "app/Http/Controllers/Api/V1_0/CustController.php",
    "groupTitle": "ipad-客户管理"
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
    "type": "get",
    "url": "1.0.0/house_num",
    "title": "职业次数",
    "name": "house_num",
    "group": "GroupName",
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/house_num"
      }
    ],
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n}",
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
    "filename": "app/Http/Controllers/Api/V1_0/CustController.php",
    "groupTitle": "ipad-客户管理"
  },
  {
    "type": "get",
    "url": "1.0.0/intention_area",
    "title": "意向面积",
    "name": "intention_area",
    "group": "GroupName",
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/intention_area"
      }
    ],
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n}",
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
    "filename": "app/Http/Controllers/Api/V1_0/CustController.php",
    "groupTitle": "ipad-客户管理"
  },
  {
    "type": "post",
    "url": "api/1.0.0/buyinfo",
    "title": "已认购",
    "name": "buyinfo",
    "group": "GroupNameji",
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/buyinfo"
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
    "filename": "app/Http/Controllers/Api/V1_0/LedgerController.php",
    "groupTitle": "置业台账"
  },
  {
    "type": "post",
    "url": "api/1.0.0/buyinfopass",
    "title": "认购未通过",
    "name": "buyinfopass",
    "group": "GroupNameji",
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/buyinfopass"
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
    "filename": "app/Http/Controllers/Api/V1_0/LedgerController.php",
    "groupTitle": "置业台账"
  },
  {
    "type": "post",
    "url": "api/1.0.0/changecust",
    "title": "已更名",
    "name": "changecust",
    "group": "GroupNameji",
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/changecust"
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
    "filename": "app/Http/Controllers/Api/V1_0/LedgerController.php",
    "groupTitle": "置业台账"
  },
  {
    "type": "post",
    "url": "api/1.0.0/changehome",
    "title": "已换房",
    "name": "changehome",
    "group": "GroupNameji",
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/changehome"
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
    "filename": "app/Http/Controllers/Api/V1_0/LedgerController.php",
    "groupTitle": "置业台账"
  },
  {
    "type": "post",
    "url": "api/1.0.0/changepass",
    "title": "更名未通过",
    "name": "changepass",
    "group": "GroupNameji",
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/changepass"
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
    "filename": "app/Http/Controllers/Api/V1_0/LedgerController.php",
    "groupTitle": "置业台账"
  },
  {
    "type": "post",
    "url": "api/1.0.0/checkout",
    "title": "已退房",
    "name": "checkout",
    "group": "GroupNameji",
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/checkout"
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
    "filename": "app/Http/Controllers/Api/V1_0/LedgerController.php",
    "groupTitle": "置业台账"
  },
  {
    "type": "post",
    "url": "api/1.0.0/delaysing",
    "title": "已延迟",
    "name": "delaysing",
    "group": "GroupNameji",
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/delaysing"
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
    "filename": "app/Http/Controllers/Api/V1_0/LedgerController.php",
    "groupTitle": "置业台账"
  },
  {
    "type": "post",
    "url": "api/1.0.0/signinfo",
    "title": "已签约",
    "name": "signinfo",
    "group": "GroupNameji",
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/signinfo"
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
    "filename": "app/Http/Controllers/Api/V1_0/LedgerController.php",
    "groupTitle": "置业台账"
  },
  {
    "type": "post",
    "url": "api/1.0.0/trackinfo",
    "title": "客户来访查找",
    "name": "delegate",
    "group": "GroupNamejj",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "hous_id",
            "description": "<p>职业顾问id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "page",
            "description": "<p>页码</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/trackinfo"
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
    "url": "api/1.0.0/trackcust",
    "title": "获取客户来访记录",
    "name": "trackcust",
    "group": "GroupNamejj",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "cust_id",
            "description": "<p>客户id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "page",
            "description": "<p>页码</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/trackcust"
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
    "url": "api/1.0.0/trackinsert",
    "title": "添加客户来访",
    "name": "trackinsert",
    "group": "GroupNamejj",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "cust_id",
            "description": "<p>客户id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "hous_id",
            "description": "<p>职业顾问id</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "demand",
            "description": "<p>意向等级</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "content",
            "description": "<p>来访内容</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/trackinsert"
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
    "url": "api/1.0.0/trackupdate",
    "title": "编辑客户来访",
    "name": "trackupdate",
    "group": "GroupNamejj",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "trackid",
            "description": "<p>来访id</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "content",
            "description": "<p>来访内容</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/trackupdate"
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
    "url": "api/1.0.0/trackge",
    "title": "客户跟踪查找",
    "name": "trackge",
    "group": "GroupNamejl",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "hous_id",
            "description": "<p>职业顾问id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "page",
            "description": "<p>页码</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/trackge"
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
    "filename": "app/Http/Controllers/Api/V1_0/TrackgeController.php",
    "groupTitle": "客户跟踪管理"
  },
  {
    "type": "post",
    "url": "api/1.0.0/trackgecust",
    "title": "获取客户跟踪记录",
    "name": "trackgecust",
    "group": "GroupNamejl",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "cust_id",
            "description": "<p>客户id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "page",
            "description": "<p>页码</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/trackgecust"
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
    "filename": "app/Http/Controllers/Api/V1_0/TrackgeController.php",
    "groupTitle": "客户跟踪管理"
  },
  {
    "type": "post",
    "url": "api/1.0.0/trackgeinsert",
    "title": "添加客户跟踪",
    "name": "trackgeinsert",
    "group": "GroupNamejl",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "cust_id",
            "description": "<p>客户id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "hous_id",
            "description": "<p>职业顾问id</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "demand",
            "description": "<p>意向等级</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "content",
            "description": "<p>跟踪内容</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/trackgeinsert"
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
    "filename": "app/Http/Controllers/Api/V1_0/TrackgeController.php",
    "groupTitle": "客户跟踪管理"
  },
  {
    "type": "post",
    "url": "api/1.0.0/trackgeupdate",
    "title": "编辑客户跟踪",
    "name": "trackgeupdate",
    "group": "GroupNamejl",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "trackid",
            "description": "<p>跟踪id</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "content",
            "description": "<p>跟踪内容</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/trackgeupdate"
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
    "filename": "app/Http/Controllers/Api/V1_0/TrackgeController.php",
    "groupTitle": "客户跟踪管理"
  },
  {
    "type": "get",
    "url": "1.0.0/ownership",
    "title": "职业关注",
    "name": "ownership",
    "group": "GroupName",
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/ownership"
      }
    ],
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n}",
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
    "filename": "app/Http/Controllers/Api/V1_0/CustController.php",
    "groupTitle": "ipad-客户管理"
  },
  {
    "type": "get",
    "url": "1.0.0/purpose",
    "title": "职业目的",
    "name": "purpose",
    "group": "GroupName",
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/purpose"
      }
    ],
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n}",
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
    "filename": "app/Http/Controllers/Api/V1_0/CustController.php",
    "groupTitle": "ipad-客户管理"
  },
  {
    "type": "get",
    "url": "1.0.0/residence",
    "title": "居住类型",
    "name": "residence",
    "group": "GroupName",
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/residence"
      }
    ],
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n}",
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
    "filename": "app/Http/Controllers/Api/V1_0/CustController.php",
    "groupTitle": "ipad-客户管理"
  },
  {
    "type": "post",
    "url": "1.0.0/rocedure",
    "title": "手续记录",
    "name": "rocedure",
    "group": "GroupName",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "cust_id",
            "description": "<p>客户id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/rocedure"
      }
    ],
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n}",
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
    "filename": "app/Http/Controllers/Api/V1_0/CustController.php",
    "groupTitle": "ipad-客户管理"
  },
  {
    "type": "get",
    "url": "1.0.0/search",
    "title": "客户检索",
    "name": "search",
    "group": "GroupName",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "realname",
            "description": "<p>客户姓名</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "mobile",
            "description": "<p>手机号</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "page",
            "description": "<p>页码</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "demand",
            "description": "<p>意向等级</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "hous_id",
            "description": "<p>职业顾问id</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "starting_time",
            "description": "<p>开始时间</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "end_time",
            "description": "<p>结束时间</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "first_contact",
            "description": "<p>首次接触方式</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/search"
      }
    ],
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n}",
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
    "filename": "app/Http/Controllers/Api/V1_0/CustController.php",
    "groupTitle": "ipad-客户管理"
  },
  {
    "type": "get",
    "url": "1.0.0/status_id",
    "title": "客户状态",
    "name": "status_id",
    "group": "GroupName",
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/status_id"
      }
    ],
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n}",
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
    "filename": "app/Http/Controllers/Api/V1_0/CustController.php",
    "groupTitle": "ipad-客户管理"
  },
  {
    "type": "post",
    "url": "1.0.0/store",
    "title": "客户添加",
    "name": "store",
    "group": "GroupName",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "realname",
            "description": "<p>客户姓名</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "mobile",
            "description": "<p>手机号</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "sex",
            "description": "<p>性别</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "hous_id",
            "description": "<p>职业顾问id</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "shou_time",
            "description": "<p>首次接触时间</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "first_contact",
            "description": "<p>首次接触方式</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "idcard",
            "description": "<p>身份证</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "birthday",
            "description": "<p>生日</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "cognition",
            "description": "<p>认知渠道</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "family_str",
            "description": "<p>家庭结构</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "work_type",
            "description": "<p>工作类型</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "address",
            "description": "<p>联系地址</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "ownership",
            "description": "<p>职业关注</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "purpose",
            "description": "<p>职业目的</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "area",
            "description": "<p>客户区域</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "residence",
            "description": "<p>居住类型</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "intention_area",
            "description": "<p>意向面积</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "floor_like",
            "description": "<p>楼层偏好</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "structure",
            "description": "<p>户型结构</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "apartment",
            "description": "<p>户型关注</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "furniture_need",
            "description": "<p>家具需求</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "house_num",
            "description": "<p>职业次数</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "demand",
            "description": "<p>客户意向等级</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/store"
      }
    ],
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n}",
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
    "filename": "app/Http/Controllers/Api/V1_0/CustController.php",
    "groupTitle": "ipad-客户管理"
  },
  {
    "type": "get",
    "url": "1.0.0/structure",
    "title": "户型结构",
    "name": "structure",
    "group": "GroupName",
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/structure"
      }
    ],
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n}",
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
    "filename": "app/Http/Controllers/Api/V1_0/CustController.php",
    "groupTitle": "ipad-客户管理"
  },
  {
    "type": "get",
    "url": "1.0.0/work_type",
    "title": "工作类型",
    "name": "work_type",
    "group": "GroupName",
    "sampleRequest": [
      {
        "url": "http://192.168.1.218/fang/public/api/1.0.0/work_type"
      }
    ],
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "成功返回:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"101\",\n  \"message\": \"请求成功\",\n  \"result\" : $data\n}",
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
    "filename": "app/Http/Controllers/Api/V1_0/CustController.php",
    "groupTitle": "ipad-客户管理"
  }
] });
