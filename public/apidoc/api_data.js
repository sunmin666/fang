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
    "type": "post",
    "url": "api/1.0.0/deleadd",
    "title": "添加委派者",
    "name": "deleadd",
    "group": "GroupNamcsjds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "hous_id",
            "description": "<p>置业顾问id</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "remarks",
            "description": "<p>派遣内容</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "appointees",
            "description": "<p>派遣者id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/deleadd"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/DelegateController.php",
    "groupTitle": "小后台任务委派Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/delealldel",
    "title": "任务委派全选删除",
    "name": "delealldel",
    "group": "GroupNamcsjds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "gate_id",
            "description": "<p>委派id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/delealldel"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/DelegateController.php",
    "groupTitle": "小后台任务委派Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/deledel",
    "title": "任务委派删除",
    "name": "deledel",
    "group": "GroupNamcsjds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "gate_id",
            "description": "<p>委派id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/deledel"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/DelegateController.php",
    "groupTitle": "小后台任务委派Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/deledsit",
    "title": "任务委派详情",
    "name": "deledsit",
    "group": "GroupNamcsjds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "gate_id",
            "description": "<p>委派id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/deledsit"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/DelegateController.php",
    "groupTitle": "小后台任务委派Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/deleedit",
    "title": "任务委派修改",
    "name": "deleedit",
    "group": "GroupNamcsjds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "gate_id",
            "description": "<p>委派id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "hous_id",
            "description": "<p>置业顾问id</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "remarks",
            "description": "<p>派遣内容</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "appointees",
            "description": "<p>派遣者id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/deleedit"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/DelegateController.php",
    "groupTitle": "小后台任务委派Api"
  },
  {
    "type": "get",
    "url": "api/1.0.0/delehous",
    "title": "查看所有委派者",
    "name": "delehous",
    "group": "GroupNamcsjds",
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/delehous"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/DelegateController.php",
    "groupTitle": "小后台任务委派Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/deleshow",
    "title": "任务委派列表",
    "name": "deleshow",
    "group": "GroupNamcsjds",
    "parameter": {
      "fields": {
        "参数": [
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/deleshow"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/DelegateController.php",
    "groupTitle": "小后台任务委派Api"
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
            "field": "subscription_num",
            "description": "<p>认购编号</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/paydetails"
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/paylog"
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
            "field": "cust_id",
            "description": "<p>客户id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
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
            "field": "hous_id",
            "description": "<p>职业顾问id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/delegate"
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
    "filename": "app/Http/Controllers/Api/V1_0/BuyinfoController.php",
    "groupTitle": "认购"
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
        "url": "http://192.168.1.13/fang/public/api/1.0.0/house_num"
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
        "url": "http://192.168.1.13/fang/public/api/1.0.0/intention_area"
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
    "url": "api/1.0.0/culalldel",
    "title": "企业全选删除",
    "name": "culalldel",
    "group": "GroupNamejdgc",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "cult_id",
            "description": "<p>企业文化id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/culalldel"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CultureController.php",
    "groupTitle": "小后台企业文化管理"
  },
  {
    "type": "post",
    "url": "api/1.0.0/culallfil",
    "title": "企业分类",
    "name": "culallfil",
    "group": "GroupNamejdgc",
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/culallfil"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CultureController.php",
    "groupTitle": "小后台企业文化管理"
  },
  {
    "type": "post",
    "url": "api/1.0.0/culdel",
    "title": "企业文化删除",
    "name": "culdel",
    "group": "GroupNamejdgc",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "cult_id",
            "description": "<p>企业文化id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/culdel"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CultureController.php",
    "groupTitle": "小后台企业文化管理"
  },
  {
    "type": "post",
    "url": "api/1.0.0/culdetails",
    "title": "企业文化详情",
    "name": "culdetails",
    "group": "GroupNamejdgc",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "cult_id",
            "description": "<p>企业文化id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/culdetails"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CultureController.php",
    "groupTitle": "小后台企业文化管理"
  },
  {
    "type": "post",
    "url": "api/1.0.0/culedit",
    "title": "企业文化修改",
    "name": "culedit",
    "group": "GroupNamejdgc",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "cult_id",
            "description": "<p>企业文化id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "class_id",
            "description": "<p>企业文化图片分类</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "imgpath",
            "description": "<p>企业文化图片</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "title",
            "description": "<p>企业文化标题</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/culedit"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CultureController.php",
    "groupTitle": "小后台企业文化管理"
  },
  {
    "type": "post",
    "url": "api/1.0.0/cullist",
    "title": "企业文化列表",
    "name": "cullist",
    "group": "GroupNamejdgc",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "page",
            "description": "<p>页码</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "class_id",
            "description": "<p>分类筛选</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/cullist"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CultureController.php",
    "groupTitle": "小后台企业文化管理"
  },
  {
    "type": "post",
    "url": "api/1.0.0/culturadd",
    "title": "企业文化添加",
    "name": "culturadd",
    "group": "GroupNamejdgc",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "class_id",
            "description": "<p>企业文化分类</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "imgpath",
            "description": "<p>企业文化图片</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "title",
            "description": "<p>企业文化标题</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/culturadd"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CultureController.php",
    "groupTitle": "小后台企业文化管理"
  },
  {
    "type": "post",
    "url": "api/1.0.0/culturemany",
    "title": "单文件上传图片",
    "name": "culturemany",
    "group": "GroupNamejdgc",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "file",
            "optional": false,
            "field": "image",
            "description": "<p>图片</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/culturemany"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CultureController.php",
    "groupTitle": "小后台企业文化管理"
  },
  {
    "type": "post",
    "url": "api/1.0.0/cultureone",
    "title": "多文件上传图片",
    "name": "cultureone",
    "group": "GroupNamejdgc",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "file",
            "optional": false,
            "field": "image",
            "description": "<p>图片</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/cultureone"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CultureController.php",
    "groupTitle": "小后台企业文化管理"
  },
  {
    "type": "post",
    "url": "api/1.0.0/community",
    "title": "社区实景列表",
    "name": "community",
    "group": "GroupNamejdkc",
    "parameter": {
      "fields": {
        "参数": [
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/community"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/PicalbumController.php",
    "groupTitle": "小后台楼盘相册Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/houseroom",
    "title": "居室分类",
    "name": "houseroom",
    "group": "GroupNamejdkc",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "field_id",
            "description": "<p>户型id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/houseroom"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/PicalbumController.php",
    "groupTitle": "小后台楼盘相册Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/houshome",
    "title": "户型图列表",
    "name": "houshome",
    "group": "GroupNamejdkc",
    "parameter": {
      "fields": {
        "参数": [
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/houshome"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/PicalbumController.php",
    "groupTitle": "小后台楼盘相册Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/lingasss",
    "title": "户型分类",
    "name": "lingasss",
    "group": "GroupNamejdkc",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "field_id",
            "description": "<p>户型图id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/lingasss"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/PicalbumController.php",
    "groupTitle": "小后台楼盘相册Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/picaladd",
    "title": "楼盘相册添加",
    "name": "picaladd",
    "group": "GroupNamejdkc",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "class_id",
            "description": "<p>楼盘相册分类</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "imgpath",
            "description": "<p>楼盘相册图片</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "review",
            "description": "<p>点评</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "picname",
            "description": "<p>图片名称</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "ling_room",
            "description": "<p>添加户型图需要添加户型</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "house_room",
            "description": "<p>添加户型图需要添加居室</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "area_room",
            "description": "<p>添加户型图需要添加面积</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/picaladd"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/PicalbumController.php",
    "groupTitle": "小后台楼盘相册Api"
  },
  {
    "type": "get",
    "url": "api/1.0.0/picclasss",
    "title": "楼盘相册分类",
    "name": "picclasss",
    "group": "GroupNamejdkc",
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/picclasss"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/PicalbumController.php",
    "groupTitle": "小后台楼盘相册Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/position",
    "title": "位置交通图列表",
    "name": "position",
    "group": "GroupNamejdkc",
    "parameter": {
      "fields": {
        "参数": [
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/position"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/PicalbumController.php",
    "groupTitle": "小后台楼盘相册Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/renddeis",
    "title": "效果图/位置交通图/社区实景/样板间/周边配套/详情",
    "name": "renddeis",
    "group": "GroupNamejdkc",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "pic_id",
            "description": "<p>楼盘相册id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/renddeis"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/PicalbumController.php",
    "groupTitle": "小后台楼盘相册Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/rendering",
    "title": "效果图列表",
    "name": "rendering",
    "group": "GroupNamejdkc",
    "parameter": {
      "fields": {
        "参数": [
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/rendering"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/PicalbumController.php",
    "groupTitle": "小后台楼盘相册Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/samroom",
    "title": "样板间列表",
    "name": "samroom",
    "group": "GroupNamejdkc",
    "parameter": {
      "fields": {
        "参数": [
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/samroom"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/PicalbumController.php",
    "groupTitle": "小后台楼盘相册Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/surrounding",
    "title": "周边配套列表",
    "name": "surrounding",
    "group": "GroupNamejdkc",
    "parameter": {
      "fields": {
        "参数": [
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/surrounding"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/PicalbumController.php",
    "groupTitle": "小后台楼盘相册Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/discount",
    "title": "添加折扣",
    "name": "discount",
    "group": "GroupNamejds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "enjoy",
            "description": "<p>折扣</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "role_id",
            "description": "<p>角色</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/discount"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/EnjoyController.php",
    "groupTitle": "小后台折扣Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/disshow",
    "title": "折扣列表",
    "name": "disshow",
    "group": "GroupNamejds",
    "parameter": {
      "fields": {
        "参数": [
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/disshow"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/EnjoyController.php",
    "groupTitle": "小后台折扣Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/knowalldel",
    "title": "营销知识库全选删除",
    "name": "knowalldel",
    "group": "GroupNamejdsd",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "know_id",
            "description": "<p>营销知识库id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/knowalldel"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/KnowleController.php",
    "groupTitle": "小后台营销知识库Api"
  },
  {
    "type": "get",
    "url": "api/1.0.0/knowclass",
    "title": "营销知识库分类",
    "name": "knowclass",
    "group": "GroupNamejdsd",
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/knowclass"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/KnowleController.php",
    "groupTitle": "小后台营销知识库Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/knowdetails",
    "title": "营销知识库详情",
    "name": "knowdetails",
    "group": "GroupNamejdsd",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "know_id",
            "description": "<p>营销知识库id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/knowdetails"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/KnowleController.php",
    "groupTitle": "小后台营销知识库Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/knowleadd",
    "title": "添加营销知识库",
    "name": "knowleadd",
    "group": "GroupNamejdsd",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "class_id",
            "description": "<p>营销知识库分类</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "title",
            "description": "<p>知识库标题</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "content",
            "description": "<p>知识库内容</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "hous_id",
            "description": "<p>添加人</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/knowleadd"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/KnowleController.php",
    "groupTitle": "小后台营销知识库Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/knowledel",
    "title": "营销知识库删除",
    "name": "knowledel",
    "group": "GroupNamejdsd",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "know_id",
            "description": "<p>营销知识库id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/knowledel"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/KnowleController.php",
    "groupTitle": "小后台营销知识库Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/knowledit",
    "title": "营销知识库修改",
    "name": "knowledit",
    "group": "GroupNamejdsd",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "know_id",
            "description": "<p>营销知识库id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "class_id",
            "description": "<p>营销知识库分类</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "title",
            "description": "<p>知识库标题</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "content",
            "description": "<p>知识库内容</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/knowledit"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/KnowleController.php",
    "groupTitle": "小后台营销知识库Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/knowleshow",
    "title": "营销知识库列表",
    "name": "knowleshow",
    "group": "GroupNamejdsd",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "class_id",
            "description": "<p>分类筛选</p>"
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/knowleshow"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/KnowleController.php",
    "groupTitle": "小后台营销知识库Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/endetails",
    "title": "折扣详情",
    "name": "endetails",
    "group": "GroupNamejds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "enjoy_id",
            "description": "<p>折扣id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/endetails"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/EnjoyController.php",
    "groupTitle": "小后台折扣Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/enjoyalldel",
    "title": "折扣全选删除",
    "name": "enjoyalldel",
    "group": "GroupNamejds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "enjoy_id",
            "description": "<p>折扣id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/enjoyalldel"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/EnjoyController.php",
    "groupTitle": "小后台折扣Api"
  },
  {
    "type": "get",
    "url": "api/1.0.0/enjoyallnu",
    "title": "查看所有折扣",
    "name": "enjoyallnu",
    "group": "GroupNamejds",
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/enjoyallnu"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/EnjoyController.php",
    "groupTitle": "小后台折扣Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/enjoydel",
    "title": "折扣删除",
    "name": "enjoydel",
    "group": "GroupNamejds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "enjoy_id",
            "description": "<p>折扣id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/enjoydel"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/EnjoyController.php",
    "groupTitle": "小后台折扣Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/enjoyedit",
    "title": "折扣修改",
    "name": "enjoyedit",
    "group": "GroupNamejds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "enjoy_id",
            "description": "<p>折扣id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "role_id",
            "description": "<p>角色</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "enjoy",
            "description": "<p>折扣</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/enjoyedit"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/EnjoyController.php",
    "groupTitle": "小后台折扣Api"
  },
  {
    "type": "get",
    "url": "api/1.0.0/apartment",
    "title": "关注户型",
    "name": "apartment",
    "group": "GroupNamejfkc",
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/apartment"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CustController.php",
    "groupTitle": "小后台客户管理Api"
  },
  {
    "type": "get",
    "url": "api/1.0.0/area",
    "title": "客户区域",
    "name": "area",
    "group": "GroupNamejfkc",
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/area"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CustController.php",
    "groupTitle": "小后台客户管理Api"
  },
  {
    "type": "get",
    "url": "api/1.0.0/cusfirst",
    "title": "修改时首次接触方式",
    "name": "cusfirst",
    "group": "GroupNamejfkc",
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/cusfirst"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CustController.php",
    "groupTitle": "小后台客户管理Api"
  },
  {
    "type": "get",
    "url": "api/1.0.0/cusfirstadd",
    "title": "添加时首次接触方式",
    "name": "cusfirstadd",
    "group": "GroupNamejfkc",
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/cusfirstadd"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CustController.php",
    "groupTitle": "小后台客户管理Api"
  },
  {
    "type": "get",
    "url": "api/1.0.0/cusfloor",
    "title": "楼层偏好",
    "name": "cusfloor",
    "group": "GroupNamejfkc",
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/cusfloor"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CustController.php",
    "groupTitle": "小后台客户管理Api"
  },
  {
    "type": "get",
    "url": "api/1.0.0/cushounum",
    "title": "置业此数",
    "name": "cushounum",
    "group": "GroupNamejfkc",
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/cushounum"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CustController.php",
    "groupTitle": "小后台客户管理Api"
  },
  {
    "type": "get",
    "url": "api/1.0.0/cusneed",
    "title": "家具需求",
    "name": "cusneed",
    "group": "GroupNamejfkc",
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/cusneed"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CustController.php",
    "groupTitle": "小后台客户管理Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/custadd",
    "title": "客户添加",
    "name": "custadd",
    "group": "GroupNamejfkc",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "realname",
            "description": "<p>客户真实姓名</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "sex",
            "description": "<p>客户性别</p>"
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
            "type": "int",
            "optional": true,
            "field": "email",
            "description": "<p>客户邮箱</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "idcard",
            "description": "<p>身份证号码</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "birthday",
            "description": "<p>生日</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "first_time",
            "description": "<p>首次接触时间</p>"
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
            "type": "int",
            "optional": true,
            "field": "address",
            "description": "<p>联系地址</p>"
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
            "description": "<p>置业次数</p>"
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
            "type": "int",
            "optional": true,
            "field": "status_id",
            "description": "<p>客户状态</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "ownership",
            "description": "<p>置业关注</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "purpose",
            "description": "<p>置业目的</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "area",
            "description": "<p>客户区域</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "residence",
            "description": "<p>居住类型</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "structure",
            "description": "<p>户型结构</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "demand",
            "description": "<p>意向等级</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "apartment",
            "description": "<p>关注户型</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "hous_id",
            "description": "<p>置业顾问</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/custadd"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CustController.php",
    "groupTitle": "小后台客户管理Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/custalldel",
    "title": "客户全选删除",
    "name": "custalldel",
    "group": "GroupNamejfkc",
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/custalldel"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CustController.php",
    "groupTitle": "小后台客户管理Api"
  },
  {
    "type": "get",
    "url": "api/1.0.0/custausicd",
    "title": "客户状态",
    "name": "custausicd",
    "group": "GroupNamejfkc",
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/custausicd"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CustController.php",
    "groupTitle": "小后台客户管理Api"
  },
  {
    "type": "get",
    "url": "api/1.0.0/custcogn",
    "title": "认知渠道",
    "name": "custcogn",
    "group": "GroupNamejfkc",
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/custcogn"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CustController.php",
    "groupTitle": "小后台客户管理Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/custdel",
    "title": "客户删除",
    "name": "custdel",
    "group": "GroupNamejfkc",
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/custdel"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CustController.php",
    "groupTitle": "小后台客户管理Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/custdesit",
    "title": "客户详情",
    "name": "custdesit",
    "group": "GroupNamejfkc",
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/custdesit"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CustController.php",
    "groupTitle": "小后台客户管理Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/custedit",
    "title": "客户修改",
    "name": "custedit",
    "group": "GroupNamejfkc",
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
            "field": "realname",
            "description": "<p>客户真实姓名</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "sex",
            "description": "<p>客户性别</p>"
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
            "type": "int",
            "optional": false,
            "field": "email",
            "description": "<p>客户邮箱</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "idcard",
            "description": "<p>身份证号码</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "birthday",
            "description": "<p>生日</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "first_time",
            "description": "<p>首次接触时间</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "cognition",
            "description": "<p>认知渠道</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "family_str",
            "description": "<p>家庭结构</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "work_type",
            "description": "<p>工作类型</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "address",
            "description": "<p>联系地址</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "intention_area",
            "description": "<p>意向面积</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "floor_like",
            "description": "<p>楼层偏好</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "furniture_need",
            "description": "<p>家具需求</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "house_num",
            "description": "<p>置业次数</p>"
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
            "type": "int",
            "optional": false,
            "field": "ownership",
            "description": "<p>置业关注</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "purpose",
            "description": "<p>置业目的</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "area",
            "description": "<p>客户区域</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "residence",
            "description": "<p>居住类型</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "structure",
            "description": "<p>户型结构</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "demand",
            "description": "<p>意向等级</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "apartment",
            "description": "<p>关注户型</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "hous_id",
            "description": "<p>置业顾问</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/custedit"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CustController.php",
    "groupTitle": "小后台客户管理Api"
  },
  {
    "type": "get",
    "url": "api/1.0.0/custfam",
    "title": "家庭结构",
    "name": "custfam",
    "group": "GroupNamejfkc",
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/custfam"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CustController.php",
    "groupTitle": "小后台客户管理Api"
  },
  {
    "type": "get",
    "url": "api/1.0.0/custhous",
    "title": "查询所有置业顾问",
    "name": "custhous",
    "group": "GroupNamejfkc",
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/custhous"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CustController.php",
    "groupTitle": "小后台客户管理Api"
  },
  {
    "type": "get",
    "url": "api/1.0.0/custnten",
    "title": "意向面积",
    "name": "custnten",
    "group": "GroupNamejfkc",
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/custnten"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CustController.php",
    "groupTitle": "小后台客户管理Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/custshow",
    "title": "客户列表",
    "name": "custshow",
    "group": "GroupNamejfkc",
    "parameter": {
      "fields": {
        "参数": [
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
            "field": "name",
            "description": "<p>置业顾问筛选</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "realname",
            "description": "<p>客户姓名筛选</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "mobile",
            "description": "<p>手机号筛选</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/custshow"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CustController.php",
    "groupTitle": "小后台客户管理Api"
  },
  {
    "type": "get",
    "url": "api/1.0.0/cuwork",
    "title": "工作类型",
    "name": "cuwork",
    "group": "GroupNamejfkc",
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/cuwork"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CustController.php",
    "groupTitle": "小后台客户管理Api"
  },
  {
    "type": "get",
    "url": "api/1.0.0/demand",
    "title": "意向等级",
    "name": "demand",
    "group": "GroupNamejfkc",
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/demand"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CustController.php",
    "groupTitle": "小后台客户管理Api"
  },
  {
    "type": "get",
    "url": "api/1.0.0/ownership",
    "title": "置业关注",
    "name": "ownership",
    "group": "GroupNamejfkc",
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/ownership"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CustController.php",
    "groupTitle": "小后台客户管理Api"
  },
  {
    "type": "get",
    "url": "api/1.0.0/purpose",
    "title": "置业目的",
    "name": "purpose",
    "group": "GroupNamejfkc",
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/purpose"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CustController.php",
    "groupTitle": "小后台客户管理Api"
  },
  {
    "type": "get",
    "url": "api/1.0.0/residence",
    "title": "居住类型",
    "name": "residence",
    "group": "GroupNamejfkc",
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/residence"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CustController.php",
    "groupTitle": "小后台客户管理Api"
  },
  {
    "type": "get",
    "url": "api/1.0.0/structure",
    "title": "户型结构",
    "name": "structure",
    "group": "GroupNamejfkc",
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/structure"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CustController.php",
    "groupTitle": "小后台客户管理Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/regdetails",
    "title": "项目详情",
    "name": "regdetails",
    "group": "GroupNamejh",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "mobile",
            "description": "<p>用户手机号</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/regdetails"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/ProjectController.php",
    "groupTitle": "小后台项目信息Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/regedit",
    "title": "项目信息修改",
    "name": "regedit",
    "group": "GroupNamejh",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "mobile",
            "description": "<p>用户手机号</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "pro_cname",
            "description": "<p>项目名称</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "comp",
            "description": "<p>所属公司</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "project_add",
            "description": "<p>项目地址</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "sales_add",
            "description": "<p>售楼地址</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "home_number",
            "description": "<p>总户数</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "main_unit",
            "description": "<p>主力户型</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "opening_time",
            "description": "<p>开盘时间</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "developers",
            "description": "<p>开发商</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "property_type",
            "description": "<p>物业类型</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "archit_type",
            "description": "<p>建筑类型</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "situation",
            "description": "<p>建筑情况</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/regedit"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/ProjectController.php",
    "groupTitle": "小后台项目信息Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/registrati",
    "title": "项目信息添加",
    "name": "registrati",
    "group": "GroupNamejh",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "cust_id",
            "description": "<p>用户id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "mobile",
            "description": "<p>用户手机号</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "pro_cname",
            "description": "<p>项目名称</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "comp",
            "description": "<p>所属公司</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "project_add",
            "description": "<p>项目地址</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "sales_add",
            "description": "<p>售楼地址</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "home_number",
            "description": "<p>总户数</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "main_unit",
            "description": "<p>主力户型</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "opening_time",
            "description": "<p>开盘时间</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "developers",
            "description": "<p>开发商</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "property_type",
            "description": "<p>物业类型</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "archit_type",
            "description": "<p>建筑类型</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "situation",
            "description": "<p>建筑情况</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/registrati"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/ProjectController.php",
    "groupTitle": "小后台项目信息Api"
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
            "type": "string",
            "optional": true,
            "field": "search",
            "description": "<p>客户姓名或手机号</p>"
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
          },
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "search",
            "description": "<p>客户姓名或手机号</p>"
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/chahome"
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
    "url": "api/1.0.0/chakouthome",
    "title": "退房",
    "name": "chakouthome",
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
            "type": "string",
            "optional": true,
            "field": "search",
            "description": "<p>客户姓名或手机号</p>"
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/chakouthome"
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
          },
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "search",
            "description": "<p>客户姓名或手机号</p>"
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/changname"
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
    "url": "api/1.0.0/sdelay",
    "title": "延迟签约",
    "name": "sdelay",
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
            "type": "string",
            "optional": true,
            "field": "search",
            "description": "<p>客户姓名或手机号</p>"
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/sdelay"
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
    "url": "api/1.0.0/signt",
    "title": "签约",
    "name": "signt",
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
            "type": "string",
            "optional": true,
            "field": "search",
            "description": "<p>客户姓名或手机号</p>"
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/signt"
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
    "type": "post",
    "url": "api/1.0.0/reemail",
    "title": "邮箱注册",
    "name": "reemail",
    "group": "GroupNamejs",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "mobile",
            "description": "<p>手机号</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "email",
            "description": "<p>邮箱</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "password",
            "description": "<p>密码</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/reemail"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/RegistrController.php",
    "groupTitle": "小后台客户注册Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/registr",
    "title": "注册手机验证码",
    "name": "registr",
    "group": "GroupNamejs",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "mobile",
            "description": "<p>手机号</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/registr"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/RegistrController.php",
    "groupTitle": "小后台客户注册Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/reinsert",
    "title": "验证验证码",
    "name": "reinsert",
    "group": "GroupNamejs",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "rcode",
            "description": "<p>验证码</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/reinsert"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/RegistrController.php",
    "groupTitle": "小后台客户注册Api"
  },
  {
    "type": "get",
    "url": "api/1.0.0/fieldinfo",
    "title": "获取所有字段信息",
    "name": "fieldinfo",
    "group": "GroupNamelfj",
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/fieldinfo"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/FieldController.php",
    "groupTitle": "小后台字段管理Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/relalldel/",
    "title": "角色全选删除",
    "name": "relalldel",
    "group": "GroupNameljs",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "role_id",
            "description": "<p>角色id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/relalldel"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/RelationController.php",
    "groupTitle": "角色api"
  },
  {
    "type": "get",
    "url": "api/1.0.0/relalljs/",
    "title": "查看所有角色名称",
    "name": "relalljs",
    "group": "GroupNameljs",
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/relalljs"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/RelationController.php",
    "groupTitle": "角色api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/relatiget",
    "title": "角色列表",
    "name": "relatiget",
    "group": "GroupNameljs",
    "parameter": {
      "fields": {
        "参数": [
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/relatiget"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/RelationController.php",
    "groupTitle": "角色api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/relation",
    "title": "小后台角色添加",
    "name": "relation",
    "group": "GroupNameljs",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "role_title",
            "description": "<p>角色标题 只限英文</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "role_name",
            "description": "<p>角色名称</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "description",
            "description": "<p>角色描述</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/relation"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/RelationController.php",
    "groupTitle": "角色api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/reldetails",
    "title": "角色详情",
    "name": "reldetails",
    "group": "GroupNameljs",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "role_id",
            "description": "<p>角色id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/reldetails"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/RelationController.php",
    "groupTitle": "角色api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/reledel/",
    "title": "角色删除",
    "name": "reledel",
    "group": "GroupNameljs",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "role_id",
            "description": "<p>角色id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/reledel"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/RelationController.php",
    "groupTitle": "角色api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/reledit/",
    "title": "角色修改",
    "name": "reledit",
    "group": "GroupNameljs",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "role_id",
            "description": "<p>角色id</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "role_title",
            "description": "<p>角色标题 只限英文</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "role_name",
            "description": "<p>角色名称</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "description",
            "description": "<p>角色描述</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/reledit"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/RelationController.php",
    "groupTitle": "角色api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/login",
    "title": "客户登录",
    "name": "login",
    "group": "GroupNamelo",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "mobile",
            "description": "<p>手机号</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "password",
            "description": "<p>密码</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/login"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/LoginController.php",
    "groupTitle": "小后台客户登录Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/member",
    "title": "添加成员",
    "name": "member",
    "group": "GroupNameloos",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "mobile",
            "description": "<p>手机号</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "password",
            "description": "<p>密码</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "passconfirm",
            "description": "<p>确认密码</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "email",
            "description": "<p>邮箱</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "sex",
            "description": "<p>性别</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "idcrad",
            "description": "<p>身份证号</p>"
          },
          {
            "group": "参数",
            "type": "sting",
            "optional": false,
            "field": "name",
            "description": "<p>姓名</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "is_ipad",
            "description": "<p>是否可以登录pc</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "role_id",
            "description": "<p>角色</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "enjoy",
            "description": "<p>折扣</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/member"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/MemberController.php",
    "groupTitle": "小后台成员列表Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/memdetails",
    "title": "成员详情",
    "name": "memdetails",
    "group": "GroupNameloos",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "hous_id",
            "description": "<p>成员id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/memdetails"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/MemberController.php",
    "groupTitle": "小后台成员列表Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/memealldel",
    "title": "成员全选删除",
    "name": "memealldel",
    "group": "GroupNameloos",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "hous_id",
            "description": "<p>成员id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/memealldel"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/MemberController.php",
    "groupTitle": "小后台成员列表Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/memedel",
    "title": "成员删除",
    "name": "memedel",
    "group": "GroupNameloos",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "hous_id",
            "description": "<p>成员id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/memedel"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/MemberController.php",
    "groupTitle": "小后台成员列表Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/memedit",
    "title": "成员修改",
    "name": "memedit",
    "group": "GroupNameloos",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "hous_id",
            "description": "<p>成员id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "mobile",
            "description": "<p>手机号</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "password",
            "description": "<p>密码</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "email",
            "description": "<p>邮箱</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "sex",
            "description": "<p>性别</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "idcrad",
            "description": "<p>身份证号</p>"
          },
          {
            "group": "参数",
            "type": "sting",
            "optional": false,
            "field": "name",
            "description": "<p>姓名</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "is_ipad",
            "description": "<p>是否可以登录pc</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "role_id",
            "description": "<p>角色</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "enjoy",
            "description": "<p>折扣</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/memedit"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/MemberController.php",
    "groupTitle": "小后台成员列表Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/memprohibit",
    "title": "成员禁用",
    "name": "memprohibit",
    "group": "GroupNameloos",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "hous_id",
            "description": "<p>成员id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "status",
            "description": "<p>状态</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/memprohibit"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/MemberController.php",
    "groupTitle": "小后台成员列表Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/memshow",
    "title": "成员列表",
    "name": "memshow",
    "group": "GroupNameloos",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "role_id",
            "description": "<p>角色筛选</p>"
          },
          {
            "group": "参数",
            "type": "sting",
            "optional": true,
            "field": "name",
            "description": "<p>姓名筛选</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "mobile",
            "description": "<p>手机号筛选</p>"
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/memshow"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/MemberController.php",
    "groupTitle": "小后台成员列表Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/menu",
    "title": "获取所有菜单",
    "name": "menu",
    "group": "GroupNamelos",
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/menu"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/MenuController.php",
    "groupTitle": "小后台菜单管理Api"
  },
  {
    "type": "get",
    "url": "1.0.0/ownership",
    "title": "职业关注",
    "name": "ownership",
    "group": "GroupName",
    "sampleRequest": [
      {
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
    "type": "post",
    "url": "api/1.0.0/homeidshow",
    "title": "通过房号获取homeid",
    "name": "homeidshow",
    "group": "GroupNamoojds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "field_id",
            "description": "<p>房号id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/homeidshow"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/PurchaseController.php",
    "groupTitle": "小后台置业计划方案Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/puralldel",
    "title": "置业方案全选删除",
    "name": "puralldel",
    "group": "GroupNamoojds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "planid",
            "description": "<p>置业计划方案id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/puralldel"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/PurchaseController.php",
    "groupTitle": "小后台置业计划方案Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/purchadd",
    "title": "添加置业方案",
    "name": "purchadd",
    "group": "GroupNamoojds",
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
            "field": "type",
            "description": "<p>缴费方案 1表示一次性 0表示按揭</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "once_total",
            "description": "<p>选择一次性付款需要填写总金额</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "years",
            "description": "<p>选择按揭时需要填写年限</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "month_price",
            "description": "<p>选择按揭时需要填写月供</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "month_total",
            "description": "<p>选择按揭时需要填写按揭总金额</p>"
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
            "description": "<p>方案如：方案一</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/purchadd"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/PurchaseController.php",
    "groupTitle": "小后台置业计划方案Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/purcshow",
    "title": "置业方案列表",
    "name": "purcshow",
    "group": "GroupNamoojds",
    "parameter": {
      "fields": {
        "参数": [
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
            "field": "realname",
            "description": "<p>客户姓名筛选</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "mobile",
            "description": "<p>手机号筛选</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/purcshow"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/PurchaseController.php",
    "groupTitle": "小后台置业计划方案Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/purdedit置业方案修改",
    "title": "",
    "name": "purdedit",
    "group": "GroupNamoojds",
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
            "field": "planid",
            "description": "<p>置业计划方案id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "type",
            "description": "<p>缴费方案 1表示一次性 0表示按揭</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "once_total",
            "description": "<p>选择一次性付款需要填写总金额</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "years",
            "description": "<p>选择按揭时需要填写年限</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "month_price",
            "description": "<p>选择按揭时需要填写月供</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "month_total",
            "description": "<p>选择按揭时需要填写按揭总金额</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "programme",
            "description": "<p>方案如：方案一</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/purdedit"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/PurchaseController.php",
    "groupTitle": "小后台置业计划方案Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/purdel",
    "title": "置业方案删除",
    "name": "purdel",
    "group": "GroupNamoojds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "planid",
            "description": "<p>置业计划方案id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/purdel"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/PurchaseController.php",
    "groupTitle": "小后台置业计划方案Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/purdesie",
    "title": "置业方案详情",
    "name": "purdesie",
    "group": "GroupNamoojds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "planid",
            "description": "<p>置业计划方案id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/purdesie"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/PurchaseController.php",
    "groupTitle": "小后台置业计划方案Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/coowdalldel",
    "title": "共有人全选删除",
    "name": "coowdalldel",
    "group": "GroupNamsejds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "coow_id",
            "description": "<p>共有人id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/coowdalldel"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CoownerController.php",
    "groupTitle": "小后台共有人Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/coowddel",
    "title": "共有人删除",
    "name": "coowddel",
    "group": "GroupNamsejds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "coow_id",
            "description": "<p>共有人id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/coowddel"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CoownerController.php",
    "groupTitle": "小后台共有人Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/coowdedit",
    "title": "共有人修改",
    "name": "coowdedit",
    "group": "GroupNamsejds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "coow_id",
            "description": "<p>共有人id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "relation",
            "description": "<p>共有人与客户的关系</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "realname",
            "description": "<p>共有人姓名</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "sex",
            "description": "<p>共有人性别</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "birthday",
            "description": "<p>共有人生日</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "idcard",
            "description": "<p>共有人身份证号</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "mobile",
            "description": "<p>共有人手机号</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/coowdedit"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CoownerController.php",
    "groupTitle": "小后台共有人Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/coowdesit",
    "title": "共有人详情",
    "name": "coowdesit",
    "group": "GroupNamsejds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "coow_id",
            "description": "<p>共有人id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/coowdesit"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CoownerController.php",
    "groupTitle": "小后台共有人Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/coowneradd",
    "title": "添加共有人",
    "name": "coowneradd",
    "group": "GroupNamsejds",
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
            "field": "relation",
            "description": "<p>共有人与客户的关系0=配偶 1=儿子 2=女儿 3=父亲 4=母亲 5=亲戚</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "realname",
            "description": "<p>共有人姓名</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "sex",
            "description": "<p>共有人性别</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "birthday",
            "description": "<p>共有人生日</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "idcard",
            "description": "<p>共有人身份证号</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "mobile",
            "description": "<p>共有人手机号</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/coowneradd"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CoownerController.php",
    "groupTitle": "小后台共有人Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/coowshow",
    "title": "共有人列表",
    "name": "coowshow",
    "group": "GroupNamsejds",
    "parameter": {
      "fields": {
        "参数": [
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
            "optional": false,
            "field": "realname",
            "description": "<p>共有人分类筛选</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "mobile",
            "description": "<p>共有人手机号</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/coowshow"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/CoownerController.php",
    "groupTitle": "小后台共有人Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/mobilename",
    "title": "通过手机号查客户",
    "name": "mobilename",
    "group": "GroupNamsejuei",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "mobile",
            "description": "<p>客户手机号</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/mobilename"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/RemindController.php",
    "groupTitle": "小后台预约提醒Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/remdalldel",
    "title": "提醒全选删除",
    "name": "remdalldel",
    "group": "GroupNamsejuei",
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/remdalldel"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/RemindController.php",
    "groupTitle": "小后台预约提醒Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/remddel",
    "title": "提醒删除",
    "name": "remddel",
    "group": "GroupNamsejuei",
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/remddel"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/RemindController.php",
    "groupTitle": "小后台预约提醒Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/remdedit",
    "title": "提醒修改",
    "name": "remdedit",
    "group": "GroupNamsejuei",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "remi_id",
            "description": "<p>提醒id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "modular",
            "description": "<p>相关业务</p>"
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
            "type": "string",
            "optional": false,
            "field": "remind_time",
            "description": "<p>提醒到期时间</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/remdedit"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/RemindController.php",
    "groupTitle": "小后台预约提醒Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/remdeist",
    "title": "提醒详情",
    "name": "remdeist",
    "group": "GroupNamsejuei",
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/remdeist"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/RemindController.php",
    "groupTitle": "小后台预约提醒Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/reminadd",
    "title": "提醒添加",
    "name": "reminadd",
    "group": "GroupNamsejuei",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "hous_id",
            "description": "<p>置业顾问id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "modular",
            "description": "<p>相关业务</p>"
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
            "type": "string",
            "optional": false,
            "field": "remind_time",
            "description": "<p>提醒到期时间</p>"
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/reminadd"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/RemindController.php",
    "groupTitle": "小后台预约提醒Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/remshow",
    "title": "提醒列表",
    "name": "remshow",
    "group": "GroupNamsejuei",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "page",
            "description": "<p>页码</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "hous_id",
            "description": "<p>置业顾问筛选</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "modular",
            "description": "<p>业务筛选</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/remshow"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/RemindController.php",
    "groupTitle": "小后台预约提醒Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/payadd",
    "title": "缴费添加",
    "name": "payadd",
    "group": "GroupNamseopds",
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
            "field": "type",
            "description": "<p>类型 1表示定金 2表示一次性 3按揭</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "subscription_num",
            "description": "<p>认购编号</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "money",
            "description": "<p>缴费金额</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "remarks",
            "description": "<p>缴费备注</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/payadd"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/PayloController.php",
    "groupTitle": "小后台缴费Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/payalldel",
    "title": "缴费全选删除",
    "name": "payalldel",
    "group": "GroupNamseopds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "payl_id",
            "description": "<p>缴费id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/payalldel"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/PayloController.php",
    "groupTitle": "小后台缴费Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/paybuy",
    "title": "查看客户下的认购编号",
    "name": "paybuy",
    "group": "GroupNamseopds",
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/paybuy"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/PayloController.php",
    "groupTitle": "小后台缴费Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/paydel",
    "title": "缴费删除",
    "name": "paydel",
    "group": "GroupNamseopds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "payl_id",
            "description": "<p>缴费id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/paydel"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/PayloController.php",
    "groupTitle": "小后台缴费Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/paydesit",
    "title": "缴费详情",
    "name": "paydesit",
    "group": "GroupNamseopds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "payl_id",
            "description": "<p>缴费id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/paydesit"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/PayloController.php",
    "groupTitle": "小后台缴费Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/payedit",
    "title": "缴费修改",
    "name": "payedit",
    "group": "GroupNamseopds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "payl_id",
            "description": "<p>缴费id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "money",
            "description": "<p>缴费金额</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "remarks",
            "description": "<p>缴费备注</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/payedit"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/PayloController.php",
    "groupTitle": "小后台缴费Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/payshow",
    "title": "缴费列表",
    "name": "payshow",
    "group": "GroupNamseopds",
    "parameter": {
      "fields": {
        "参数": [
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/payshow"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/PayloController.php",
    "groupTitle": "小后台缴费Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/buyadd",
    "title": "小后台认购添加",
    "name": "buyadd",
    "group": "GroupNamsepids",
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
            "field": "idcard",
            "description": "<p>客户身份证</p>"
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
            "description": "<p>付款金额</p>"
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
            "optional": true,
            "field": "month_pay",
            "description": "<p>月供选择按揭必填</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "loan_term",
            "description": "<p>年限选择按揭必填</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "total_price",
            "description": "<p>总金额</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "remarks",
            "description": "<p>认购备注</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "relation",
            "description": "<p>共有人与客户的关系</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": true,
            "field": "realname",
            "description": "<p>共有人姓名</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "sex",
            "description": "<p>共有人性别</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "birthday",
            "description": "<p>共有人生日</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "mobile",
            "description": "<p>共有人手机号</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/buyadd"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/BuyinfoController.php",
    "groupTitle": "小后认购签约Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/buyalldel",
    "title": "小后台认购全选删除",
    "name": "buyalldel",
    "group": "GroupNamsepids",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "buyid",
            "description": "<p>认购id</p>"
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
            "type": "int",
            "optional": false,
            "field": "homeid",
            "description": "<p>房源id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/buyalldel"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/BuyinfoController.php",
    "groupTitle": "小后认购签约Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/buydeist",
    "title": "小后台认购详情",
    "name": "buydeist",
    "group": "GroupNamsepids",
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/buydeist"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/BuyinfoController.php",
    "groupTitle": "小后认购签约Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/buydel",
    "title": "小后台认购删除",
    "name": "buydel",
    "group": "GroupNamsepids",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "buyid",
            "description": "<p>认购id</p>"
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
            "type": "int",
            "optional": false,
            "field": "homeid",
            "description": "<p>房源id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/buydel"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/BuyinfoController.php",
    "groupTitle": "小后认购签约Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/buyedit",
    "title": "小后台认购修改",
    "name": "buyedit",
    "group": "GroupNamsepids",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "buyid",
            "description": "<p>认购id</p>"
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
            "field": "realname",
            "description": "<p>客户姓名</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "idcard",
            "description": "<p>客户身份证</p>"
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
            "type": "int",
            "optional": false,
            "field": "lock_time",
            "description": "<p>房源锁定时间</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "pay_num",
            "description": "<p>付款金额</p>"
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
            "optional": true,
            "field": "month_pay",
            "description": "<p>月供选择按揭必填</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "loan_term",
            "description": "<p>年限选择按揭必填</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "total_price",
            "description": "<p>总金额</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "remarks",
            "description": "<p>认购备注</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/buyedit"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/BuyinfoController.php",
    "groupTitle": "小后认购签约Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/buyfinance",
    "title": "小后台财务审核",
    "name": "buyfinance",
    "group": "GroupNamsepids",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "buyid",
            "description": "<p>单前认购id</p>"
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
            "field": "finance_admin",
            "description": "<p>财务审核人</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "finance_verify_status",
            "description": "<p>经理审核状态0=未通过 1=通过 “ ” = 未审核</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "finance_verify_remarks",
            "description": "<p>经理审核备注</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/buyfinance"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/BuyinfoController.php",
    "groupTitle": "小后认购签约Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/buymanager",
    "title": "小后台经理审核",
    "name": "buymanager",
    "group": "GroupNamsepids",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "buyid",
            "description": "<p>单前认购id</p>"
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
            "field": "manage_admin",
            "description": "<p>审核人姓名</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "manager_verify_status",
            "description": "<p>经理审核状态0=未通过 1=通过 “ ” = 未审核</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "manager_verify_remarks",
            "description": "<p>经理审核备注</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/buymanager"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/BuyinfoController.php",
    "groupTitle": "小后认购签约Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/buyshow",
    "title": "小后台认购列表",
    "name": "buyshow",
    "group": "GroupNamsepids",
    "parameter": {
      "fields": {
        "参数": [
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/buyshow"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/BuyinfoController.php",
    "groupTitle": "小后认购签约Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/custinfo",
    "title": "查询用户信息",
    "name": "custinfo",
    "group": "GroupNamsepids",
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/custinfo"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/BuyinfoController.php",
    "groupTitle": "小后认购签约Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/homeinfo",
    "title": "查询房源的具体信息",
    "name": "homeinfo",
    "group": "GroupNamsepids",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "homeid",
            "description": "<p>房源id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/homeinfo"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/BuyinfoController.php",
    "groupTitle": "小后认购签约Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/homestaus",
    "title": "查询可以认购的房源",
    "name": "homestaus",
    "group": "GroupNamsepids",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "field_id",
            "description": "<p>单元id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "floorid",
            "description": "<p>楼层id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/homestaus"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/BuyinfoController.php",
    "groupTitle": "小后认购签约Api"
  },
  {
    "type": "get",
    "url": "api/1.0.0/buildnum",
    "title": "查看所有楼号",
    "name": "buildnum",
    "group": "GroupNamsoojds",
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/buildnum"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/HomeinfoController.php",
    "groupTitle": "小后台房源管理Api"
  },
  {
    "type": "get",
    "url": "api/1.0.0/floorcl",
    "title": "查看所有楼层",
    "name": "floorcl",
    "group": "GroupNamsoojds",
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/floorcl"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/HomeinfoController.php",
    "groupTitle": "小后台房源管理Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/homeadd",
    "title": "添加房源信息",
    "name": "homeadd",
    "group": "GroupNamsoojds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "buildnum",
            "description": "<p>楼号id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "unitnum",
            "description": "<p>单元id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "roomnum",
            "description": "<p>房号id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "floor",
            "description": "<p>楼层id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "house_str",
            "description": "<p>户型结构id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "price",
            "description": "<p>房子单价</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "total",
            "description": "<p>房子总价</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "discount",
            "description": "<p>房子折扣</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "status",
            "description": "<p>房子销售状态 0表示认购前(绿色) 1预定房源申请中(橙色) 2表示已认购 (蓝色)3表示以签约(红色)</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "buyid",
            "description": "<p>房子认购编号</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "remarks",
            "description": "<p>房子备注信息</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/homeadd"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/HomeinfoController.php",
    "groupTitle": "小后台房源管理Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/homealldel",
    "title": "房源信息全选删除",
    "name": "homealldel",
    "group": "GroupNamsoojds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "homeid",
            "description": "<p>房源id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/homealldel"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/HomeinfoController.php",
    "groupTitle": "小后台房源管理Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/homebuild",
    "title": "查看房屋面积/户型图",
    "name": "homebuild",
    "group": "GroupNamsoojds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "field_id",
            "description": "<p>户型结构id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/homebuild"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/HomeinfoController.php",
    "groupTitle": "小后台房源管理Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/homedeis",
    "title": "房源信息详情",
    "name": "homedeis",
    "group": "GroupNamsoojds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "homeid",
            "description": "<p>房源id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/homedeis"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/HomeinfoController.php",
    "groupTitle": "小后台房源管理Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/homedel",
    "title": "房源信息删除",
    "name": "homedel",
    "group": "GroupNamsoojds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "homeid",
            "description": "<p>房源id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/homeedit"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/HomeinfoController.php",
    "groupTitle": "小后台房源管理Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/homeedit",
    "title": "房源信息修改",
    "name": "homeedit",
    "group": "GroupNamsoojds",
    "parameter": {
      "fields": {
        "参数": [
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
            "field": "buildnum",
            "description": "<p>楼号id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "unitnum",
            "description": "<p>单元id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "roomnum",
            "description": "<p>房号id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "floor",
            "description": "<p>楼层</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "house_str",
            "description": "<p>户型结构id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "price",
            "description": "<p>房子单价</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "total",
            "description": "<p>房子总价</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "discount",
            "description": "<p>房子折扣</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "status",
            "description": "<p>房子销售状态 0表示认购前(绿色) 1预定房源申请中(橙色) 2表示已认购 (蓝色)3表示以签约(红色)</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "buyid",
            "description": "<p>房子认购编号</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "remarks",
            "description": "<p>房子备注信息</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/homeedit"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/HomeinfoController.php",
    "groupTitle": "小后台房源管理Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/homepic",
    "title": "销控图表",
    "name": "homepic",
    "group": "GroupNamsoojds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "buildnum",
            "description": "<p>楼号筛选</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "unitnum",
            "description": "<p>单元筛选</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "floor",
            "description": "<p>楼层筛选</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/homepic"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/HomeinfoController.php",
    "groupTitle": "小后台房源管理Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/homeshow",
    "title": "房源信息列表",
    "name": "homeshow",
    "group": "GroupNamsoojds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "buildnum",
            "description": "<p>楼号筛选(id)</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "unitnum",
            "description": "<p>单元筛选(id)</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "roomnum",
            "description": "<p>房号筛选(id)</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "floor",
            "description": "<p>楼层筛选(id)</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "status",
            "description": "<p>房源状态筛选</p>"
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
        "url": "http://192.168.1.220/fang/public/api/1.0.0/homeshow"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/HomeinfoController.php",
    "groupTitle": "小后台房源管理Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/housestr",
    "title": "户型结构",
    "name": "housestr",
    "group": "GroupNamsoojds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "field_id",
            "description": "<p>户型分类</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/housestr"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/HomeinfoController.php",
    "groupTitle": "小后台房源管理Api"
  },
  {
    "type": "get",
    "url": "api/1.0.0/linghhasss",
    "title": "户型分类",
    "name": "linghhasss",
    "group": "GroupNamsoojds",
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/linghhasss"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/HomeinfoController.php",
    "groupTitle": "小后台房源管理Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/roomnum",
    "title": "查看单元下的房号",
    "name": "roomnum",
    "group": "GroupNamsoojds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "field_id",
            "description": "<p>楼号id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/roomnum"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/HomeinfoController.php",
    "groupTitle": "小后台房源管理Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/unitnum",
    "title": "查看楼号下的单元",
    "name": "unitnum",
    "group": "GroupNamsoojds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "field_id",
            "description": "<p>楼号id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/unitnum"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/HomeinfoController.php",
    "groupTitle": "小后台房源管理Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/trackadd",
    "title": "跟踪来访添加",
    "name": "trackadd",
    "group": "GroupNamssjds",
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
            "description": "<p>置业顾问id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "track_type",
            "description": "<p>访问类型，1跟踪，0来访</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "content",
            "description": "<p>跟踪或来访内容</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/trackadd"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/TrackController.php",
    "groupTitle": "小后台跟踪来访Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/trackalldel",
    "title": "跟踪来访全选删除",
    "name": "trackalldel",
    "group": "GroupNamssjds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "trackid",
            "description": "<p>跟踪来访id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/trackalldel"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/TrackController.php",
    "groupTitle": "小后台跟踪来访Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/trackdel",
    "title": "跟踪来访删除",
    "name": "trackdel",
    "group": "GroupNamssjds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "trackid",
            "description": "<p>跟踪来访id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/trackdel"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/TrackController.php",
    "groupTitle": "小后台跟踪来访Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/trackdsit",
    "title": "跟踪来访详情",
    "name": "trackdsit",
    "group": "GroupNamssjds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "trackid",
            "description": "<p>跟踪来访id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/trackdsit"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/TrackController.php",
    "groupTitle": "小后台跟踪来访Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/trackedit",
    "title": "跟踪来访修改",
    "name": "trackedit",
    "group": "GroupNamssjds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "trackid",
            "description": "<p>跟踪来访id</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "hous_id",
            "description": "<p>置业顾问idtrackid</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "track_type",
            "description": "<p>访问类型，1跟踪，0来访</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "content",
            "description": "<p>跟踪或来访内容</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/trackedit"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/TrackController.php",
    "groupTitle": "小后台跟踪来访Api"
  },
  {
    "type": "post",
    "url": "api/1.0.0/trackshow",
    "title": "跟踪来访列表",
    "name": "trackshow",
    "group": "GroupNamssjds",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "int",
            "optional": false,
            "field": "page",
            "description": "<p>页码</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "hous_id",
            "description": "<p>置业顾问筛选</p>"
          },
          {
            "group": "参数",
            "type": "int",
            "optional": true,
            "field": "track_type",
            "description": "<p>访问类型筛选，1跟踪，0来访</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.220/fang/public/api/1.0.0/trackshow"
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
    "filename": "app/Http/Controllers/Api/V1_0/xiao/TrackController.php",
    "groupTitle": "小后台跟踪来访Api"
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
  },
  {
    "type": "get",
    "url": "api/1.0.0/checkout/create",
    "title": "退房发起",
    "name": "create",
    "group": "Groupcheckout",
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
        "url": "http://192.168.1.13/fang/public/api/1.0.0/checkout/create"
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
    "filename": "app/Http/Controllers/Api/V1_0/CheckoutController.php",
    "groupTitle": "退房"
  },
  {
    "type": "get",
    "url": "api/1.0.0/checkout/search",
    "title": "退房列表与检索",
    "name": "search",
    "group": "Groupcheckout",
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
            "description": "<p>分页</p>"
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
        "url": "http://192.168.1.13/fang/public/api/1.0.0/checkout/search"
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
    "filename": "app/Http/Controllers/Api/V1_0/CheckoutController.php",
    "groupTitle": "退房"
  },
  {
    "type": "post",
    "url": "api/1.0.0/checkout/store",
    "title": "退房新增",
    "name": "store",
    "group": "Groupcheckout",
    "parameter": {
      "fields": {
        "参数": [
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
            "optional": false,
            "field": "old_homeid",
            "description": "<p>房源id</p>"
          },
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
            "optional": true,
            "field": "remarks",
            "description": "<p>备注信息</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.13/fang/public/api/1.0.0/checkout/store"
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
    "filename": "app/Http/Controllers/Api/V1_0/CheckoutController.php",
    "groupTitle": "退房"
  },
  {
    "type": "get",
    "url": "api/1.0.0/checkout/view",
    "title": "退房详情",
    "name": "view",
    "group": "Groupcheckout",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "chan_id",
            "description": "<p>退房id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.13/fang/public/api/1.0.0/checkout/view"
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
    "filename": "app/Http/Controllers/Api/V1_0/CheckoutController.php",
    "groupTitle": "退房"
  },
  {
    "type": "get",
    "url": "api/1.0.0/delayed/create",
    "title": "签约发起",
    "name": "create",
    "group": "Groupdelayed",
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
        "url": "http://192.168.1.13/fang/public/api/1.0.0/delayed/create"
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
    "filename": "app/Http/Controllers/Api/V1_0/DelayedController.php",
    "groupTitle": "延迟签约"
  },
  {
    "type": "get",
    "url": "api/1.0.0/delayed/search",
    "title": "签约列表与检索",
    "name": "search",
    "group": "Groupdelayed",
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
            "description": "<p>分页</p>"
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
        "url": "http://192.168.1.13/fang/public/api/1.0.0/delayed/search"
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
    "filename": "app/Http/Controllers/Api/V1_0/DelayedController.php",
    "groupTitle": "延迟签约"
  },
  {
    "type": "post",
    "url": "api/1.0.0/delayed/store",
    "title": "签约新增",
    "name": "store",
    "group": "Groupdelayed",
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
            "field": "homeid",
            "description": "<p>房源id</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "sign_remarks",
            "description": "<p>职业顾问备注</p>"
          },
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
        "url": "http://192.168.1.13/fang/public/api/1.0.0/delayed/store"
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
    "filename": "app/Http/Controllers/Api/V1_0/DelayedController.php",
    "groupTitle": "延迟签约"
  },
  {
    "type": "get",
    "url": "api/1.0.0/delayed/view",
    "title": "签约详情",
    "name": "view",
    "group": "Groupdelayed",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "signid",
            "description": "<p>签约id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.13/fang/public/api/1.0.0/delayed/view"
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
    "filename": "app/Http/Controllers/Api/V1_0/DelayedController.php",
    "groupTitle": "延迟签约"
  },
  {
    "type": "get",
    "url": "api/1.0.0/home/index",
    "title": "销控信息",
    "name": "amount",
    "group": "Grouphome",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "buildnum",
            "description": "<p>楼号信息</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.13/fang/public/api/1.0.0/home/index"
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
    "filename": "app/Http/Controllers/Api/V1_0/HomeController.php",
    "groupTitle": "销控表"
  },
  {
    "type": "get",
    "url": "api/1.0.0/home/count",
    "title": "楼号房源总量",
    "name": "count",
    "group": "Grouphome",
    "sampleRequest": [
      {
        "url": "http://192.168.1.13/fang/public/api/1.0.0/home/count"
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
    "filename": "app/Http/Controllers/Api/V1_0/HomeController.php",
    "groupTitle": "销控表"
  },
  {
    "type": "get",
    "url": "api/1.0.0/home/counts",
    "title": "楼号房源可售总量",
    "name": "counts",
    "group": "Grouphome",
    "sampleRequest": [
      {
        "url": "http://192.168.1.13/fang/public/api/1.0.0/home/counts"
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
    "filename": "app/Http/Controllers/Api/V1_0/HomeController.php",
    "groupTitle": "销控表"
  },
  {
    "type": "get",
    "url": "api/1.0.0/home/countss",
    "title": "楼号房源销控总量",
    "name": "countss",
    "group": "Grouphome",
    "sampleRequest": [
      {
        "url": "http://192.168.1.13/fang/public/api/1.0.0/home/countss"
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
    "filename": "app/Http/Controllers/Api/V1_0/HomeController.php",
    "groupTitle": "销控表"
  },
  {
    "type": "get",
    "url": "api/1.0.0/home/countsss",
    "title": "楼号房源已售总量",
    "name": "countsss",
    "group": "Grouphome",
    "sampleRequest": [
      {
        "url": "http://192.168.1.13/fang/public/api/1.0.0/home/countsss"
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
    "filename": "app/Http/Controllers/Api/V1_0/HomeController.php",
    "groupTitle": "销控表"
  },
  {
    "type": "get",
    "url": "api/1.0.0/home/details",
    "title": "房源信息详情",
    "name": "details",
    "group": "Grouphome",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "homeid",
            "description": "<p>房号id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.13/fang/public/api/1.0.0/home/details"
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
    "filename": "app/Http/Controllers/Api/V1_0/HomeController.php",
    "groupTitle": "销控表"
  },
  {
    "type": "get",
    "url": "api/1.0.0/signing/create",
    "title": "签约发起",
    "name": "create",
    "group": "Groupsigning",
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
        "url": "http://192.168.1.13/fang/public/api/1.0.0/signing/create"
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
    "filename": "app/Http/Controllers/Api/V1_0/SigningController.php",
    "groupTitle": "签约"
  },
  {
    "type": "get",
    "url": "api/1.0.0/signing/search",
    "title": "签约列表与检索",
    "name": "search",
    "group": "Groupsigning",
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
            "description": "<p>分页</p>"
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
        "url": "http://192.168.1.13/fang/public/api/1.0.0/signing/search"
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
    "filename": "app/Http/Controllers/Api/V1_0/SigningController.php",
    "groupTitle": "签约"
  },
  {
    "type": "post",
    "url": "api/1.0.0/signing/store",
    "title": "签约新增",
    "name": "store",
    "group": "Groupsigning",
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
            "field": "homeid",
            "description": "<p>房源id</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "sign_remarks",
            "description": "<p>职业顾问备注</p>"
          },
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
        "url": "http://192.168.1.13/fang/public/api/1.0.0/signing/store"
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
    "filename": "app/Http/Controllers/Api/V1_0/SigningController.php",
    "groupTitle": "签约"
  },
  {
    "type": "get",
    "url": "api/1.0.0/signing/view",
    "title": "签约详情",
    "name": "view",
    "group": "Groupsigning",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "signid",
            "description": "<p>签约id</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.13/fang/public/api/1.0.0/signing/view"
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
    "filename": "app/Http/Controllers/Api/V1_0/SigningController.php",
    "groupTitle": "签约"
  },
  {
    "type": "get",
    "url": "api/1.0.0/small/amount",
    "title": "销售金额排行",
    "name": "amount",
    "group": "Groupsmall",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "stime",
            "description": "<p>开始时间</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "etime",
            "description": "<p>结束时间</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.13/fang/public/api/1.0.0/small/amount"
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
    "filename": "app/Http/Controllers/Api/V1_0/SmallController.php",
    "groupTitle": "销售排行"
  },
  {
    "type": "get",
    "url": "api/1.0.0/small/listing",
    "title": "销售套数排命",
    "name": "listing",
    "group": "Groupsmall",
    "parameter": {
      "fields": {
        "参数": [
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "stime",
            "description": "<p>开始时间</p>"
          },
          {
            "group": "参数",
            "type": "string",
            "optional": false,
            "field": "etime",
            "description": "<p>结束时间</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "http://192.168.1.13/fang/public/api/1.0.0/small/listing"
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
    "filename": "app/Http/Controllers/Api/V1_0/SmallController.php",
    "groupTitle": "销售排行"
  }
] });
