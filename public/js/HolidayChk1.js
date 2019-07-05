
var MONDAY = 1;
var TUESDAY = 2;
var WEDNESDAY = 3;

var cstImplementTheLawOfHoliday = new Date("1948/7/20");
var cstAkihitoKekkon = new Date("1959/4/10");
var cstShowaTaiso = new Date("1989/2/24");
var cstNorihitoKekkon = new Date("1993/6/9");
var cstSokuireiseiden = new Date("1990/11/12");
var cstImplementHoliday = new Date("1973/4/12");


function ktHolidayName(prmDate)
{
  var MyDate = new Date(prmDate);
  var HolidayName = prvHolidayChk(MyDate);
  var YesterDay;
  var HolidayName_ret;

  if (HolidayName == "") {
      if (MyDate.getDay() == MONDAY) {



          if (MyDate.getTime() >= cstImplementHoliday.getTime()) {
              YesterDay = new Date(MyDate.getFullYear(),
                                     MyDate.getMonth(),(MyDate.getDate()-1));
              HolidayName = prvHolidayChk(YesterDay);
              if (HolidayName != "") {
                  HolidayName_ret = "振替休日";
              } else {
                  HolidayName_ret = "";
              }
          } else {
              HolidayName_ret = "";
          }
      } else {
          HolidayName_ret = "";
      }
  } else {
      HolidayName_ret = HolidayName;
  }

  return HolidayName_ret;
}



function prvHolidayChk(MyDate)
{
  var MyYear = MyDate.getFullYear();
  var MyMonth = MyDate.getMonth() + 1;
  var MyDay = MyDate.getDate();
  var NumberOfWeek;
  var MyAutumnEquinox;

  var Result = "";

  if (MyDate.getTime() < cstImplementTheLawOfHoliday.getTime()) {
 　　return "";
  } else;

  switch (MyMonth) {

  case 1:
      if (MyDay == 1) {
          Result = "元日";
      } else {
          if (MyYear >= 2000) {
              NumberOfWeek = Math.floor((MyDay - 1) / 7) + 1;
              if ((NumberOfWeek == 2) && (MyDate.getDay() == MONDAY)) {
                  Result = "成人の日";
              } else;
          } else {
              if (MyDay == 15) {
                  Result = "成人の日";
              } else;
          }
      }
      break;

  case 2:
      if (MyDay == 11) {
          if (MyYear >= 1967) {
              Result = "建国記念の日";
          } else;
      } else {
          if (MyDate.getTime() == cstShowaTaiso.getTime()) {
              Result = "昭和天皇の大喪の礼";
          } else;
      }
      break;

  case 3:
      if (MyDay == prvDayOfSpringEquinox(MyYear)) {
          Result = "春分の日";
      } else;
      break;

  case 4:
      if (MyDay == 29) {
          if (MyYear >= 2007) {
              Result = "昭和の日";
          } else {
              if (MyYear >= 1989) {
                  Result = "みどりの日";
              } else {
                Result = "天皇誕生日";
              }
          }
      } else {
           if (MyDate.getTime() == cstAkihitoKekkon.getTime()) {
           　　Result = "皇太子明仁親王の結婚の儀";　
           } else;
      }
      break;

  case 5:
      switch ( MyDay ) {
        case 3:
          Result = "憲法記念日";
          break;
        case 4:
          if (MyYear >= 2007) {
              Result = "みどりの日";
          } else {
              if (MyYear >= 1986) {
                  if (MyDate.getDay() > MONDAY) {

                      Result = "国民の休日";
                  } else;
              } else;
          }
          break;
        case 5:
          Result = "こどもの日";
          break;
        case 6:
          if (MyYear >= 2007) {
              if ((MyDate.getDay() == TUESDAY) || (MyDate.getDay() == WEDNESDAY)) {
                  Result = "振替休日";
              } else;
          } else;
          break;
      }
      break;

  case 6:
      if (MyDate.getTime() == cstNorihitoKekkon.getTime()) {
          Result = "皇太子徳仁親王の結婚の儀";
      } else;
      break;

  case 7:
      if (MyYear >= 2003) {
          NumberOfWeek = Math.floor((MyDay - 1) / 7) + 1;
          if ((NumberOfWeek == 3) && (MyDate.getDay() == MONDAY)) {
              Result = "海の日";
          } else;
      } else {
          if (MyYear >= 1996) {
              if (MyDay == 20) {
                  Result = "海の日";
              } else;
          } else;
      }
      break;

  case 8:
      if (MyDay == 11) {
          if (MyYear >= 2016) {
              Result = "山の日";
          } else;
      } else;
      break;

  case 9:

      MyAutumnEquinox = prvDayOfAutumnEquinox(MyYear);
      if (MyDay == MyAutumnEquinox) {
          Result = "秋分の日";
      } else {
          if (MyYear >= 2003) {
              NumberOfWeek = Math.floor((MyDay - 1) / 7) + 1;
              if ((NumberOfWeek == 3) && (MyDate.getDay() == MONDAY)) {
                  Result = "敬老の日";
              } else {
                  if (MyDate.getDay() == TUESDAY) {
                      if (MyDay == (MyAutumnEquinox - 1)) {
                          Result = "国民の休日";
                      } else;
                  } else;
              }
          } else {
              if (MyYear >= 1966) {
                  if (MyDay == 15) {
                      Result = "敬老の日";
                  } else;
              } else;
          }
      }
      break;

  case 10:
      if (MyYear >= 2000) {
          NumberOfWeek = Math.floor(( MyDay - 1) / 7) + 1;
          if ((NumberOfWeek == 2) && (MyDate.getDay() == MONDAY)) {
              Result = "体育の日";
          } else;
      } else {
          if (MyYear >= 1966) {
              if (MyDay == 10) {
                  Result = "体育の日";
              } else;
          } else;
      }
      break;

  case 11:
      if (MyDay == 3) {
          Result = "文化の日";
      } else {
          if (MyDay == 23) {
              Result = "勤労感謝の日";
          } else {
              if (MyDate.getTime() == cstSokuireiseiden.getTime()) {
                  Result = "即位礼正殿の儀";
              } else;
          }
      }
      break;

  case 12:
      if (MyDay == 23) {
          if (MyYear >= 1989) {
              Result = "天皇誕生日";
          } else;
      } else;
      break;
  }

  return Result;
}




function prvDayOfSpringEquinox(MyYear)
{
  var SpringEquinox_ret;

  if (MyYear <= 1947) {
      SpringEquinox_ret = 99;
  } else {
      if (MyYear <= 1979) {

          SpringEquinox_ret = Math.floor(20.8357 + 
            (0.242194 * (MyYear - 1980)) - Math.floor((MyYear - 1980) / 4));
      } else {
          if (MyYear <= 2099) {
              SpringEquinox_ret = Math.floor(20.8431 + 
                (0.242194 * (MyYear - 1980)) - Math.floor((MyYear - 1980) / 4));
          } else {
              if (MyYear <= 2150) {
                  SpringEquinox_ret = Math.floor(21.851 + 
                    (0.242194 * (MyYear - 1980)) - Math.floor((MyYear - 1980) / 4));
              } else {
                  SpringEquinox_ret = 99;
              }
          }
      }
  }
  return SpringEquinox_ret;
}


function prvDayOfAutumnEquinox(MyYear)
{
  var AutumnEquinox_ret;

  if (MyYear <= 1947) {
      AutumnEquinox_ret = 99;
  } else {
      if (MyYear <= 1979) {

          AutumnEquinox_ret = Math.floor(23.2588 + 
            (0.242194 * (MyYear - 1980)) - Math.floor((MyYear - 1980) / 4));
      } else {
          if (MyYear <= 2099) {
              AutumnEquinox_ret = Math.floor(23.2488 + 
                (0.242194 * (MyYear - 1980)) - Math.floor((MyYear - 1980) / 4));
          } else {
              if (MyYear <= 2150) {
                  AutumnEquinox_ret = Math.floor(24.2488 + 
                    (0.242194 * (MyYear - 1980)) - Math.floor((MyYear - 1980) / 4));
              } else {
                  AutumnEquinox_ret = 99;
              }
          }
      }
  }
  return AutumnEquinox_ret;
}