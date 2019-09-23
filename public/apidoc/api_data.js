define({ "api": [
  {
    "type": "get",
    "url": "api/1.0.0/buildnum",
    "title": "查询楼号",
    "name": "buildnum",
    "group": "GroupField",
    "sampleRequest": [
      {
        "url": "http://192.168.1.13/fang/public/api/1.0.0/buildnum"
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
    "filename": "app/Http/Controllers/Api/V1_0/FieldController.php",
    "groupTitle": "房源字段信息接口"
  },
  {
    "type": "get",
    "url": "api/1.0.0/roomnum",
    "title": "查询房号",
    "name": "roomnum",
    "group": "GroupField",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "unitnum",
            "description": "<p>职业顾问id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {

        "url": "http://192.168.1.13/fang/public/api/1.0.0/login"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/roomnum"

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
    "filename": "app/Http/Controllers/Api/V1_0/FieldController.php",
    "groupTitle": "房源字段信息接口"
  },
  {
    "type": "get",
    "url": "api/1.0.0/unitnum",
    "title": "查询单元号",
    "name": "unitnum",
    "group": "GroupField",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "field_id",
            "description": "<p>职业顾问id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {

        "url": "http://192.168.1.220/fang/public/api/1.0.0/apartment"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/unitnum"

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


    "filename": "app/Http/Controllers/Api/V1_0/FieldController.php",
    "groupTitle": "房源字段信息接口"
  },
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
            "optional": false,
            "field": "mobile",
            "description": "<p>客户姓名</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "password",
            "description": "<p>手机号</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.13/fang/public/api/1.0.0/login"
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
        "url": "http://192.168.1.13/fang/public/api/1.0.0/apartment"
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
            "type": "string",
            "optional": false,
            "field": "search",
            "description": "<p>客户姓名或手机号</p>"
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

        "url": "http://192.168.1.13/fang/public/api/1.0.0/purchase"

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
            "field": "planid",
            "description": "<p>方案id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {

        "url": "http://192.168.1.220/fang/public/api/1.0.0/purdetails"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/purdetails"

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

        "url": "http://192.168.1.13/fang/public/api/1.0.0/purinsert"

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

        "url": "http://192.168.1.220/fang/public/api/1.0.0/area"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/area"

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
    "url": "api/1.0.0/paydetails",
    "title": "缴费记录详情",
    "name": "paydetails",
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
        "url": "http://192.168.1.13/fang/public/api/1.0.0/paylog"
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
    "url": "1.0.0/buyinfo",
    "title": "查询客户的认购记录",
    "name": "buyinfo",
    "group": "GroupName",

    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "string",
            "optional": false,

            "field": "subscription_num",
            "description": "<p>认购编号</p>"

            "field": "cust_id",
            "description": "<p>客户id</p>"

          }
        ]
      }
    },
    "sampleRequest": [
      {

        "url": "http://192.168.1.220/fang/public/api/1.0.0/paydetails"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/buyinfo"

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

    "filename": "app/Http/Controllers/Api/V1_0/PaylogController.php",
    "groupTitle": "缴费记录管理"
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
            "field": "hous_id",
            "description": "<p>职业顾问id</p>"
          },

    "filename": "app/Http/Controllers/Api/V1_0/CustController.php",
    "groupTitle": "ipad-客户管理"
  },
  {
    "type": "get",
    "url": "api/1.0.0/konwledge",
    "title": "营销知识查找",
    "name": "konwledge",
    "group": "GroupNamec",
    "sampleRequest": [
      {
        "url": "http://192.168.1.13/fang/public/api/1.0.0/konwledge"
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
        "url": "http://192.168.1.13/fang/public/api/1.0.0/cognition"
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

            "field": "search",
            "description": "<p>客户姓名或手机号</p>"
          },

            "field": "hous_id",
            "description": "<p>职业顾问id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.13/fang/public/api/1.0.0/delegate"
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

            "field": "page",
            "description": "<p>页码</p>"

            "field": "gate_id",
            "description": "<p>派遣id</p>"

          }
        ]
      }
    },
    "sampleRequest": [
      {

        "url": "http://192.168.1.220/fang/public/api/1.0.0/paylog"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/deleview"

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

        "url": "http://192.168.1.13/fang/public/api/1.0.0/konwledge"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/demand"

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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/cognition"

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
        "url": "http://192.168.1.13/fang/public/api/1.0.0/details"

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

        "url": "http://192.168.1.220/fang/public/api/1.0.0/delegate"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/family_str"
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
        "url": "http://192.168.1.13/fang/public/api/1.0.0/coowner"

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

        "url": "http://192.168.1.220/fang/public/api/1.0.0/demand"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/first_contact"

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

        "url": "http://192.168.1.220/fang/public/api/1.0.0/details"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/floor_like"

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

        "url": "http://192.168.1.220/fang/public/api/1.0.0/family_str"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/furniture_need"

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
    "url": "api/1.0.0/buyinfo/store",
    "title": "发起认购",
    "name": "buyinfo",
    "group": "GroupNameg",
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
            "type": "int",
            "optional": false,
            "field": "mobile",
            "description": "<p>客户手机号</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "idcard",
            "description": "<p>客户身份证号</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "address",
            "description": "<p>客户联系地址</p>"
          },
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
        "url": "http://192.168.1.13/fang/public/api/1.0.0/coowner"
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

            "description": "<p>客户id</p>"
          },
          {
            "group": "参数",
            "type": "array",
            "optional": false,
            "field": "coownerinfo",
            "description": "<p>房屋共有人</p>"
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
            "type": "int",
            "optional": false,
            "field": "pay_num",
            "description": "<p>定金</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "pay_type",
            "description": "<p>付款方案</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "remarks",
            "description": "<p>职业顾问发起的备注</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "sponsor",
            "description": "<p>职业顾问id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "month_pay",
            "description": "<p>月供</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "loan_term",
            "description": "<p>年限</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "total_price",
            "description": "<p>总金额</p>"
          }
        ]
      }

    },
    "sampleRequest": [
      {

        "url": "http://192.168.1.220/fang/public/api/1.0.0/first_contact"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/buyinfo/store"

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

    "filename": "app/Http/Controllers/Api/V1_0/BuyinfoController.php",
    "groupTitle": "认购"

  },
  {
    "type": "post",
    "url": "1.0.0/get/cust",
    "title": "客户列表",
    "name": "get_cust",
    "group": "GroupName",

    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/floor_like"

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

        "url": "http://192.168.1.220/fang/public/api/1.0.0/furniture_need"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/get/cust"

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
    "url": "api/1.0.0/buyinfo/search",
    "title": "认购列表与检索检索",
    "name": "search",
    "group": "GroupNameg",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "hous_id",
            "description": "<p>职业顾问id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "page",
            "description": "<p>职业顾问id</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "parameter",
            "description": "<p>客户手机号或姓名</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {

        "url": "http://192.168.1.13/fang/public/api/1.0.0/buyinfo"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/buyinfo/search"

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
    "groupTitle": "认购"
  },
  {
    "type": "post",
    "url": "api/1.0.0/buyinfo/view",
    "title": "认购审核详情",
    "name": "view",
    "group": "GroupNameg",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "buyid",
            "description": "<p>认购id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {

        "url": "http://192.168.1.220/fang/public/api/1.0.0/get/cust"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/buyinfo/view"

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
    "groupTitle": "认购"
  },
  {
    "type": "get",
    "url": "api/1.0.0/cultrue",
    "title": "企业文化查找",
    "name": "cultrue",
    "group": "GroupNameh",
    "sampleRequest": [
      {

        "url": "http://192.168.1.220/fang/public/api/1.0.0/cultrue"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/cultrue"

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
    "url": "api/1.0.0/salesampay",
    "title": "已售金额总量排行",
    "name": "salesampay",
    "group": "GroupNamehhc",
    "sampleRequest": [
      {

        "url": "http://192.168.1.220/fang/public/api/1.0.0/salesampay"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/house_num"

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
    "filename": "app/Http/Controllers/Api/V1_0/SalesamController.php",
    "groupTitle": "销售排行管理"
  },
  {
    "type": "post",
    "url": "api/1.0.0/remdetails",
    "title": "提醒详情",
    "name": "remdetails",
    "group": "GroupNamehh",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "remi_id",
            "description": "<p>提醒id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {

        "url": "http://192.168.1.220/fang/public/api/1.0.0/remdetails"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/intention_area"

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
    "filename": "app/Http/Controllers/Api/V1_0/RemindinfoController.php",
    "groupTitle": "提醒管理"
  },
  {
    "type": "post",
    "url": "api/1.0.0/remind",
    "title": "提醒查找",
    "name": "remind",
    "group": "GroupNamehh",
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
            "optional": true,
            "field": "status",
            "description": "<p>是否到期</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "modular",
            "description": "<p>提醒类型</p>"
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
            "optional": false,
            "field": "page",
            "description": "<p>页码</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {

        "url": "http://192.168.1.220/fang/public/api/1.0.0/remind"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/buyinfo"

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
    "filename": "app/Http/Controllers/Api/V1_0/RemindinfoController.php",
    "groupTitle": "提醒管理"
  },
  {
    "type": "post",
    "url": "api/1.0.0/reminsert",
    "title": "添加提醒",
    "name": "reminsert",
    "group": "GroupNamehh",
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
            "field": "cust_id",
            "description": "<p>客户id</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "content",
            "description": "<p>提醒内容</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "remind_time",
            "description": "<p>提醒到期时间</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "modular",
            "description": "<p>提醒模块</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {

        "url": "http://192.168.1.220/fang/public/api/1.0.0/reminsert"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/buyinfopass"
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
    "url": "api/1.0.0/chahomepass",
    "title": "换房未通过",
    "name": "chahomepass",
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
        "url": "http://192.168.1.13/fang/public/api/1.0.0/chahomepass"

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
    "filename": "app/Http/Controllers/Api/V1_0/RemindinfoController.php",
    "groupTitle": "提醒管理"
  },
  {
    "type": "get",
    "url": "1.0.0/house_num",
    "title": "职业次数",
    "name": "house_num",
    "group": "GroupName",
    "sampleRequest": [
      {

        "url": "http://192.168.1.220/fang/public/api/1.0.0/house_num"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/changecust"

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

        "url": "http://192.168.1.220/fang/public/api/1.0.0/intention_area"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/changehome"

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
    "url": "api/1.0.0/buydetails",
    "title": "认购详情",
    "name": "buydetails",
    "group": "GroupNameji",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "buyid",
            "description": "<p>认购id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {

        "url": "http://192.168.1.220/fang/public/api/1.0.0/buydetails"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/changepass"

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
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "status",
            "description": "<p>通过1 未通过2 未审核3</p>"
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

        "url": "http://192.168.1.220/fang/public/api/1.0.0/buyinfo"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/checkout"

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
    "url": "api/1.0.0/chahome",
    "title": "换房",
    "name": "chahome",
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
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "status",
            "description": "<p>通过1 未通过2 未审核3</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {

        "url": "http://192.168.1.220/fang/public/api/1.0.0/chahome"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/delaysing"

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
    "url": "api/1.0.0/changname",
    "title": "更名",
    "name": "changname",
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
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "status",
            "description": "<p>通过1 未通过2 未审核3</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {

        "url": "http://192.168.1.220/fang/public/api/1.0.0/changname"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/signinfo"

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
            "type": "string",
            "optional": false,
            "field": "search",
            "description": "<p>客户姓名或手机号</p>"
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
        "url": "http://192.168.1.13/fang/public/api/1.0.0/trackinfo"
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
    "groupTitle": "客户来访管理"
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
        "url": "http://192.168.1.13/fang/public/api/1.0.0/trackcust"
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
    "groupTitle": "客户来访管理"
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

        "url": "http://192.168.1.13/fang/public/api/1.0.0/trackinsert"

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
    "groupTitle": "客户来访管理"
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

        "url": "http://192.168.1.13/fang/public/api/1.0.0/trackupdate"

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

    "groupTitle": "客户来访管理"

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
            "type": "string",
            "optional": false,
            "field": "search",
            "description": "<p>客户姓名或手机号</p>"
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

        "url": "http://192.168.1.13/fang/public/api/1.0.0/trackge"

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

        "url": "http://192.168.1.13/fang/public/api/1.0.0/trackgecust"

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

        "url": "http://192.168.1.13/fang/public/api/1.0.0/trackgeinsert"

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

        "url": "http://192.168.1.13/fang/public/api/1.0.0/trackgeupdate"

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

        "url": "http://192.168.1.220/fang/public/api/1.0.0/ownership"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/ownership"

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

        "url": "http://192.168.1.220/fang/public/api/1.0.0/purpose"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/purpose"

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

        "url": "http://192.168.1.220/fang/public/api/1.0.0/residence"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/residence"

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

        "url": "http://192.168.1.220/fang/public/api/1.0.0/rocedure"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/rocedure"

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

        "url": "http://192.168.1.220/fang/public/api/1.0.0/search"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/search"

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

        "url": "http://192.168.1.220/fang/public/api/1.0.0/status_id"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/status_id"

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

        "url": "http://192.168.1.220/fang/public/api/1.0.0/store"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/store"

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

        "url": "http://192.168.1.220/fang/public/api/1.0.0/structure"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/structure"

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

        "url": "http://192.168.1.220/fang/public/api/1.0.0/work_type"

        "url": "http://192.168.1.13/fang/public/api/1.0.0/work_type"

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
    "url": "api/1.0.0/Changecust/create",
    "title": "更名发起",
    "name": "create",
    "group": "Groupchangcust",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "buyid",
            "description": "<p>职业顾问id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.13/fang/public/api/1.0.0/Changecust/create"
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
    "filename": "app/Http/Controllers/Api/V1_0/ChangecustController.php",
    "groupTitle": "更名"
  },
  {
    "type": "get",
    "url": "api/1.0.0/Changecust/search",
    "title": "更名列表与检索",
    "name": "search",
    "group": "Groupchangcust",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "hous_id",
            "description": "<p>职业顾问id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "page",
            "description": "<p>职业顾问id</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "parameter",
            "description": "<p>客户手机号或姓名</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.13/fang/public/api/1.0.0/Changecust/search"
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
    "filename": "app/Http/Controllers/Api/V1_0/ChangecustController.php",
    "groupTitle": "更名"
  },
  {
    "type": "post",
    "url": "api/1.0.0/Changecust/store",
    "title": "更名添加",
    "name": "store",
    "group": "Groupchangcust",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "cust_id",
            "description": "<p>客户id</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "old_homeid",
            "description": "<p>房源id</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "new_cust",
            "description": "<p>新客户id</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "buyid",
            "description": "<p>认购id</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "coownerinfo",
            "description": "<p>房屋共有人</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "pay_type",
            "description": "<p>付款方案</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "total_price",
            "description": "<p>总金额</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "month_pay",
            "description": "<p>月供</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "loan_term",
            "description": "<p>年限</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "remarks",
            "description": "<p>备注信息</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.13/fang/public/api/1.0.0/Changecust/store"
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
    "filename": "app/Http/Controllers/Api/V1_0/ChangecustController.php",
    "groupTitle": "更名"
  },
  {
    "type": "get",
    "url": "api/1.0.0/Changecust/view",
    "title": "更名审核详情",
    "name": "view",
    "group": "Groupchangcust",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "chan_id",
            "description": "<p>更名id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.13/fang/public/api/1.0.0/Changecust/view"
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
    "filename": "app/Http/Controllers/Api/V1_0/ChangecustController.php",
    "groupTitle": "更名"

  }
] });
