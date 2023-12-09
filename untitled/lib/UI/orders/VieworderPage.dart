


import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:http/http.dart' as http;
import 'package:razorpay_flutter/razorpay_flutter.dart';
import 'package:shared_preferences/shared_preferences.dart';

import '../comn/HomePage.dart';
import '../resource/UrlResourse.dart';

class PlaceOrder extends StatefulWidget {
  var productid,allqty;
  PlaceOrder({Key? key,this.productid}) : super(key: key);

  @override
  State<PlaceOrder> createState() => _PlaceOrderState();
}

class _PlaceOrderState extends State<PlaceOrder> {
  // static const platform = const MethodChannel("razaorpay_flutter");
  Razorpay _razorpay = Razorpay();

  TextEditingController address = TextEditingController();
  // TextEditingController cupencode = TextEditingController();
  TextEditingController landmark = TextEditingController();
  TextEditingController pincode = TextEditingController();

  // TextEditingController cPasswordcontroller = TextEditingController();
  // TextEditingController phonecontroller = TextEditingController();

  var status = "pandding";

  var city;
  var finalamount = 0.0;
  late Future<List?> alldata;

  getdata() async {
    Uri uri = Uri.parse(UrlResourse.GETCITY);
    var responce = await http.get(uri);
    if (responce.statusCode == 200) {
      var body = jsonDecode(responce.body);
      setState(() {
        cityData = body['cityData'];
      });
    } else {
      print("api error");
    }
  }

//offer
  List<dynamic> offeriddata = [];
  var pid;
  // var test="abc";
  // var proid =widget.productid.toString();

  // getoffer() async {
  //   Map<String,String> prams = {
  //     "productid":widget.productid
  //   };
  //   Uri uri = Uri.parse(UrlResoures.GET_OFFER_ID);
  //   var responce = await http.post(uri,body: prams);
  //   print("responce = ${responce}");
  //   print("test");
  //   if (responce.statusCode == 200) {
  //     var body = jsonDecode(responce.body);
  //     print("body = ${body}");
  //     setState(() {
  //       offeriddata = body['offeridData'];
  //       // print("offeriddata = ${offeriddata}");
  //     });
  //   } else {
  //     print("api error");
  //   }
  // }

  var imgurl = UrlResourse.productimgurl;
  List? alldata1;

  getcartdata() async {
    SharedPreferences prefs = await SharedPreferences.getInstance();

    var userid = prefs.getString("userid").toString();

    Map<String, String> prafm = {
      "user_id": userid,
    };

    Uri uri = Uri.parse(UrlResourse.VIEWCART);
    var responce = await http.post(uri, body: prafm);
    if (responce.statusCode == 200) {
      var body = jsonDecode(responce.body);
      List jsonData = body['data'] as List;
      return jsonData;
    } else {
      print("api error");
    }
  }


  var offer;
  List<dynamic> offerdata = [];
  late Future<List?> alldata2;
  var code;
  Future<List<dynamic>?> getofferdata() async {
    Uri uri = Uri.parse(UrlResourse.GET_NEW_OFFER);
    var responce = await http.post(uri,body: { "price":finalamount.toString()});
    print("object");
    if (responce.statusCode == 200) {
      var body = responce.body;
      print(body);
      var json = jsonDecode(body);
      if(json != null){
        offerdata = json['offerdata'];
      }else{
        offerdata = [];
      }

    } else {
      print("api error");
    }
  }

  var qty="";

  @override
  void initState() {
    // TODO: implement initState
    super.initState();

    print("productid = ${widget.productid}");
    print("allqty = ${widget.allqty}");
    print("finaltest = ${finalamount}");

    _razorpay = Razorpay();
    _razorpay?.on(Razorpay.EVENT_PAYMENT_SUCCESS, _handlePaymentSuccess);
    _razorpay?.on(Razorpay.EVENT_PAYMENT_ERROR, _handlePaymentError);
    _razorpay?.on(Razorpay.EVENT_EXTERNAL_WALLET, _handleExternalWallet);
    getdata();
    // alldata1 = getcartdata();
    // alldata1?.then((data) {
    //   data?.forEach((row) {
    //     finalamount = finalamount +
    //         (double.parse(row["quantity"].toString()) *
    //             double.parse(row["price"].toString()));
    //     pid = row["product_id"].toString();
    //
    //     print("amount : " + row["quantity"].toString());
    //   });
    // });
    setState(() {
      count = 0;
    });
    getAllData();
  }
  int count = 0;
  getAllData()async{
    if(count == 0)
    {
      setState(() {
        alldata2 = getofferdata();
      });
    }

    setState(() {
      finalamount =0.0;
    });
    alldata1 =await getcartdata() as List;
    alldata1!.forEach((row) {
      setState(() {
        print("demotest");
        finalamount = finalamount +
            (double.parse(row["qty"].toString()) *
                double.parse(row["price"].toString()));
        pid = row["pid"].toString();
        print("finalamount = ${finalamount}");
        print("pid = ${widget.productid}");

        qty =  row["qty"].toString();
        print("qty = ${qty}");
      });

      print("amount : " + row["qty"].toString());
    });
  }

  void _handlePaymentSuccess(PaymentSuccessResponse paymentresponse) async {
    var ars = address.text.toString();
    var land = landmark.text.toString();
    var pin = pincode.text.toString();
    var cityid;
    if(city == null)
    {
      setState(() {
        cityid = city['city_id'].toString();
      });
    }else{
      setState(() {
        cityid =cityData[0]['city_id'].toString();
      });
    }

    var sts = status.toString();

    SharedPreferences prefs = await SharedPreferences.getInstance();

    var userid = prefs.getString("userid").toString();

    print(ars);
    print(land);
    print(pin);
    print("cityid = ${cityid}");
    print(sts);

    print("aa = ${paymentresponse.paymentId}");
    print("aa = ${paymentresponse.orderId}");
    print("aa = ${paymentresponse.signature}");
    // print(pw);

    Map<String, dynamic> prafm = {
      "userid": userid,
      "address": ars,
      "landmark": land,
      "pincode": pin,
      "status": "Done",
      "is_pay": "Yes",
      "productid":widget.productid.toString(),
      "city_id": cityid,
      "qty":qty,
      "offer_id": offer != null || offer.isNotEmpty ? offer['offer_id'] : offerdata[0]['offer_id'],
      "discountamount":discountamount.toString(),
      "transnumber": paymentresponse.paymentId,
      "totalpayment": finalamount.toString(),
      // "productid":pid.toString()
    };
    print("data = ${prafm}");
    Uri uri = Uri.parse(UrlResourse.ADD_ORDER);
    var responce = await http.post(uri, body: prafm);
    print("responce = ${responce.statusCode}");
    if (responce.statusCode == 200) {

      print("responce = ${responce}");

      // var body = jsonDecode(responce.body.toString());


      var body = responce.body.toString();
      var json = jsonDecode(body);
      print("body = ${body}");
      // Navigator.of(context).push(
      //     MaterialPageRoute(builder: (context) => HomePage()));
      if (json['status'] == "true") {
        print("Payment successfully");
        Navigator.of(context).push(
            MaterialPageRoute(builder: (context) => HomePage()));
      } else {
        print("not Payment");
      }
    } else {
      print("api error");
    }
  }

  void _handlePaymentError(PaymentFailureResponse response) {
    // Do something when payment fails
  }

  void _handleExternalWallet(ExternalWalletResponse response) {
    // Do something when an external wallet was selected
  }

  List<dynamic> cityData = [];
  var addpagekey = GlobalKey<FormState>();
  bool? isVisibal = true;

  // String? address;
  // String? email;
  // String? password;
  // String? phone;
  // String? cPassword;
  // bool? isCVisibal;
  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(
          title: Text('Place Order'),
          // leading: IconButton(
          //   onPressed: () {
          //     Navigator.of(context).push(MaterialPageRoute(
          //         builder: (context) => BottomNavigationScreen()));
          //   },
          //   color: Colors.white,
          //   icon: Icon(Icons.arrow_back_rounded),
          // ),
        ),
        body: SingleChildScrollView(
          child: Center(
            child: Padding(
              padding: const EdgeInsets.only(
                bottom: 8,
              ),
              child: Form(
                key: addpagekey,
                child: Padding(
                  padding: const EdgeInsets.all(10),
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Container(
                        // height: 50,
                        decoration: BoxDecoration(
                          border: Border.all(width: 1, color: Colors.white),
                          borderRadius:
                          const BorderRadius.all(Radius.circular(50)),
                        ),
                        child: TextFormField(
                          keyboardType: TextInputType.text,
                          controller: address,
                          maxLines: 5,
                          validator: (val) {
                            if (val!.isEmpty) {
                              return "Please Enter your Address";
                            }
                            return null;
                          },
                          // cursorColor: AppColor.primaryColor,
                          decoration: InputDecoration(
                            contentPadding: EdgeInsets.all(5),
                            border: OutlineInputBorder(
                              borderRadius: BorderRadius.circular(15.0),
                            ),
                            focusedBorder: OutlineInputBorder(
                              borderRadius: BorderRadius.circular(15.0),
                              borderSide: BorderSide(
                                  // color: AppColor.primaryColor,
                                  width: 2),
                            ),
                            enabledBorder: OutlineInputBorder(
                              borderRadius: BorderRadius.circular(15.0),
                              borderSide: BorderSide(
                                // color: AppColor.primaryColor,
                              ),
                            ),

                            // prefixIcon: Icon(
                            //   Icons.person_2_outlined,
                            //   color:  AppColor.primaryColor,
                            // ),
                            filled: true,
                            hintText: "Enter your address",
                            hintStyle: TextStyle(
                              color: Colors.grey,
                            ),
                          ),
                        ),
                      ),
                      SizedBox(height: 20),
                      Container(
                        // height: 50,
                        decoration: BoxDecoration(
                          border: Border.all(width: 1, color: Colors.white),
                          borderRadius:
                          const BorderRadius.all(Radius.circular(50)),
                        ),
                        child: TextFormField(
                          keyboardType: TextInputType.text,
                          controller: landmark,
                          validator: (val) {
                            if (val!.isEmpty) {
                              return "Please Enter your landmark";
                            }
                            return null;
                          },
                          // cursorColor: AppColor.primaryColor,
                          decoration: InputDecoration(
                            contentPadding: EdgeInsets.all(5),
                            border: OutlineInputBorder(
                              borderRadius: BorderRadius.circular(15.0),
                            ),
                            focusedBorder: OutlineInputBorder(
                              borderRadius: BorderRadius.circular(15.0),
                              borderSide: BorderSide(
                                  // color: AppColor.primaryColor,
                                  width: 2),
                            ),
                            enabledBorder: OutlineInputBorder(
                              borderRadius: BorderRadius.circular(15.0),
                              borderSide: BorderSide(
                                // color: AppColor.primaryColor,
                              ),
                            ),

                            // prefixIcon: Icon(
                            //   Icons.person_2_outlined,
                            //   color:  AppColor.primaryColor,
                            // ),
                            filled: true,
                            hintText: "Enter your Landmark",
                            hintStyle: TextStyle(
                              color: Colors.grey,
                            ),
                          ),
                        ),
                      ),
                      SizedBox(height: 20),
                      Container(
                        // height: 50,
                        decoration: BoxDecoration(
                          border: Border.all(width: 1, color: Colors.white),
                          borderRadius:
                          const BorderRadius.all(Radius.circular(50)),
                        ),
                        child: TextFormField(
                          keyboardType: TextInputType.text,
                          controller: pincode,
                          validator: (val) {
                            if (val!.isEmpty) {
                              return "Please Enter your pincode";
                            }
                            return null;
                          },
                          // onSaved: (val) {
                          //   name = val;
                          // },
                          // cursorColor: AppColor.primaryColor,
                          decoration: InputDecoration(
                            contentPadding: EdgeInsets.all(5),
                            border: OutlineInputBorder(
                              borderRadius: BorderRadius.circular(15.0),
                            ),
                            focusedBorder: OutlineInputBorder(
                              borderRadius: BorderRadius.circular(15.0),
                              borderSide: BorderSide(
                                  // color: AppColor.primaryColor,
                                  width: 2),
                            ),
                            enabledBorder: OutlineInputBorder(
                              borderRadius: BorderRadius.circular(15.0),
                              borderSide: BorderSide(
                                // color: AppColor.primaryColor,
                              ),
                            ),

                            // prefixIcon: Icon(
                            //   Icons.person_2_outlined,
                            //   color:  AppColor.primaryColor,
                            // ),
                            filled: true,
                            hintText: "Enter your pincode",
                            hintStyle: TextStyle(
                              color: Colors.grey,
                            ),
                          ),
                        ),
                      ),
                      SizedBox(height: 10),
                      Container(

                        child: Row(
                          children: [
                            Text("City Name :"),
                            SizedBox(width: 15,),
                            cityData.isNotEmpty
                                ? DropdownButton(
                              // dropdownColor: Color(0xffa4469c),
                              hint: Text("Select City"),
                              value: city == null || city.isEmpty? cityData[0]:city,
                              items: cityData.map((value) {
                                return DropdownMenuItem<dynamic>(
                                  value: value,
                                  child: Text(value['city_name']),
                                );
                              }).toList(),
                              onChanged: (value) {
                                print("value = ${value}");
                                setState(() {
                                  city = value!;
                                  print(city);
                                });
                              },
                            )
                                : Container(),
                          ],
                        ),
                      ),
                      SizedBox(height: 10),
                      Container(
                        child: Row(
                          children: [
                            Text("Offer Name :"),
                            SizedBox(width: 15,),
                            offerdata.isNotEmpty
                                ? DropdownButton(
                              hint: Text("Select Offer"),
                              value:offer,
                              items: offerdata!.map((value) {
                                return DropdownMenuItem<dynamic>(
                                    value: value,
                                    child: Text(value['offer_name'])
                                );
                              }).toList(),
                              onChanged: (val) {

                                setState(() {
                                  offer = val!;
                                  count++;
                                  calculateTotal();
                                });
                              },
                            )
                                : Container(),
                          ],
                        ),
                      ),
                      const SizedBox(
                        height: 40,
                      ),

                      Center(
                        child: GestureDetector(
                          onTap: () async {
                            if (addpagekey.currentState!.validate()) {
                              print("object1111");

                              // var cupen = cupencode.text.toString();
                              // print("cupen = ${cupen}");

                              SharedPreferences prefs =
                              await SharedPreferences.getInstance();

                              var usercontact =
                              prefs.getString("usercontact").toString();
                              var useremail =
                              prefs.getString("useremail").toString();
                              // var amount = 500;



                              var options = {
                                'key': 'rzp_test_V93ZsndO4rGoCS',
                                'amount': finalamount * 100,
                                'name': 'VISIONARY ARCHITECTURE',
                                'description': 'Order',
                                'prefill': {
                                  'contact': '${usercontact}',
                                  'email': '${useremail}'
                                }
                              };
                              print("usercontact = ${usercontact}");
                              print(useremail);
                              _razorpay.open(options);
                            }
                          },
                          child: Container(
                            height: 45,
                            // width: MediaQuery.of(context).size.width/1.8,
                            alignment: Alignment.center,
                            decoration: BoxDecoration(
                              color: Color(0xffa4469c),
                              borderRadius:
                              const BorderRadius.all(Radius.circular(15) //
                              ),
                            ),
                            child: Text(
                              "Place Order : ₹" + finalamount.toString(),
                              // style: TextStyle(
                              //     fontSize: 20,
                              //     fontFamily:
                              //     color: Color(0xfffbf6fa)
                              // )
                              style: TextStyle(
                                  fontSize: 20,
                                  fontWeight: FontWeight.w600,
                                  letterSpacing: 1.2,
                                  color: Color(0xfffbf6fa),
                                  // fontFamily: ThemeService.primaryFont
                                ),
                            ),
                          ),
                        ),
                      ),
                    ],
                  ),
                ),
              ),
            ),
          ),
        ));
  }
  var discountamount;
  calculateTotal()async{

    await getAllData();
    var minpurchaseamount = offer['min_purchase_amount'];
    var discount = offer['discount'];
    if(finalamount > double.parse(minpurchaseamount)){
      discountamount = finalamount * double.parse(discount) /100;
      setState(() {
        // finalamount = finalamount - double.parse(discount);
        finalamount = finalamount - discountamount;
        print("finalamount = ${finalamount}");
      });
    }else{

    }

  }
}
