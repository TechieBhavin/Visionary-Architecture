
import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:http/http.dart' as http;
import 'package:razorpay_flutter/razorpay_flutter.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:untitled/UI/cart/paymentsuccessfullpage.dart';
import 'package:untitled/UI/resource/UrlResourse.dart';
import 'package:untitled/UI/shop/ViewproductPage.dart';

import '../comn/HomePage.dart';

class PlaceOrder extends StatefulWidget {
  List? myUniqueList;
  PlaceOrder({Key? key,this.myUniqueList}) : super(key: key);

  @override
  State<PlaceOrder> createState() => _PlaceOrderState();
}

class _PlaceOrderState extends State<PlaceOrder> {

  // static const platform = const Me
  // thodChannel("razaorpay_flutter");
  Razorpay _razorpay = Razorpay();



  TextEditingController address = TextEditingController();
  TextEditingController landmark = TextEditingController();
  TextEditingController pincode = TextEditingController();
  // TextEditingController cPasswordcontroller = TextEditingController();
  // TextEditingController phonecontroller = TextEditingController();

  var status="pandding";

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
        city = cityData[0]['city_id'];
      });
    } else {
      print("api error");
    }
  }


  var imgurl = UrlResourse.productimgurl;
  Future<List?>? alldata1;
  Future<List?>? getcartdata() async {

    SharedPreferences prefs =
    await SharedPreferences.getInstance();

    var userid = prefs.getString("userid").toString();

    Map<String,String> prafm = {
      "user_id":userid,
    };

    Uri uri = Uri.parse(UrlResourse.VIEWCART);
    var responce = await http.post(uri,body: prafm);
    if (responce.statusCode == 200) {
      var body = jsonDecode(responce.body);

      return body['data'] ;
    } else {
      print("api error");
    }
  }
  // var pid="";
  // var offer;
  // List<dynamic> offerdata = [];
  // late Future<List?> alldata2;
  // Future<List<dynamic>?> getofferdata()async{
  //   Uri uri = Uri.parse(UrlResoures.GET_OFFER);
  //   var responce = await http.get(uri);
  //   if (responce.statusCode == 200) {
  //     var body = responce.body;
  //     print(body);
  //     var json = jsonDecode(body);
  //     setState(() {
  //       offerdata = json['offerdata'];
  //       print("offerdata = ${offerdata}");
  //     });
  //
  //   } else {
  //     print("api error");
  //   }
  // }
  List<String> allQty = [];
  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    // setState(() {
    //   alldata2 = getofferdata();
    // });
    _razorpay = Razorpay();
    _razorpay?.on(Razorpay.EVENT_PAYMENT_SUCCESS, _handlePaymentSuccess);
    _razorpay?.on(Razorpay.EVENT_PAYMENT_ERROR, _handlePaymentError);
    _razorpay?.on(Razorpay.EVENT_EXTERNAL_WALLET, _handleExternalWallet);
    getdata();
    alldata1 = getcartdata();
    alldata1?.then((data){
      data?.forEach((row) {
        print(row["price"].toString());
        allQty.add(row["qty"]);
        finalamount = finalamount + (double.parse(row["qty"].toString()) * double.parse(row["price"].toString()));
        // widget.w = row["product_id"].toString();
        print("amount : "+row["qty"].toString());
        print("price : "+row["price"].toString());
        print(finalamount);
      });
    });
  }


  void _handlePaymentSuccess(PaymentSuccessResponse paymentresponse)async {
    var ars = address.text.toString();


    var land = landmark.text.toString();

    var pin = pincode.text.toString();

    var cityid = city.toString();

    var sts = status.toString();

    SharedPreferences prefs =
    await SharedPreferences.getInstance();

    var userid = prefs.getString("userid").toString();


    print(ars);
    print(land);
    print(pin);
    print("cityid = ${cityid}");
    print(sts);
    print("myUniqueList = ${widget.myUniqueList}");
    print("aa = ${paymentresponse.paymentId}");
    print("aa = ${paymentresponse.orderId}");
    print("aa = ${paymentresponse.signature}");
    // print(pw);

    Map<String,dynamic> prafm = {
      "address":ars,
      "landmark":land,
      "pincode":pin,
      "status":"Done",
      "is_pay":"Yes",
      "city_id":cityid.toString(),
      "transnumber":paymentresponse.paymentId,
      "userid":userid,
      "totalpayment":finalamount.toString(),
      "qty":allQty.toString(),
      "productid":widget.myUniqueList.toString()
    };
    print("data = ${prafm}");
    Uri uri = Uri.parse(UrlResourse.ADD_ORDER);
    var responce = await http.post(uri,body: prafm);
    if(responce.statusCode==200)
    {
      var body = responce.body.toString();
      print("body = ${body}");

      print("Payment successfully");
      // Navigator.of(context).push(
      //     MaterialPageRoute(builder: (context)=>ViewproductPage())
      // );
      // if(body=="yes")
      // {
      //   // print("Payment successfully");
      //   // Navigator.of(context).push(
      //   //     MaterialPageRoute(builder: (context)=>HomePage())
      //   // );
      // }
      // else
      // {
      //   print("not Payment");
      // }
    }
    else
    {
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
      // appBar: CustomAppBar(title: 'Place Order',leading: IconButton(
      //   onPressed: (){
      //     Navigator.of(context).push(
      //         MaterialPageRoute(builder: (context)=>BottomNavigationScreen())
      //     );
      //   },
      //   color: Colors.white,
      //   icon: Icon(Icons.arrow_back_rounded),
      // ),),
        body:SafeArea(
          child: SingleChildScrollView(
            child: Center(
              child: Padding(
                padding:
                const EdgeInsets.only(bottom: 8, ),
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
                            border:
                            Border.all(width: 1, color: Colors.white),
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
                            decoration:  InputDecoration(
                              contentPadding: EdgeInsets.all(5),
                              border: OutlineInputBorder(
                                borderRadius: BorderRadius.circular(15.0),

                              ),
                              focusedBorder: OutlineInputBorder(
                                borderRadius: BorderRadius.circular(15.0),
                                borderSide: BorderSide(
                                  // color: AppColor.primaryColor,
                                    width: 2
                                ),
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
                            border:
                            Border.all(width: 1, color: Colors.white),
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
                            decoration:  InputDecoration(
                              contentPadding: EdgeInsets.all(5),
                              border: OutlineInputBorder(
                                borderRadius: BorderRadius.circular(15.0),

                              ),
                              focusedBorder: OutlineInputBorder(
                                borderRadius: BorderRadius.circular(15.0),
                                borderSide: BorderSide(
                                  // color: AppColor.primaryColor,
                                    width: 2
                                ),
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


                        SizedBox(height: 20),
                        Container(
                          // width: 30,
                          // decoration: BoxDecoration(
                          //   border:
                          //   Border.all(width: 1, color: Colors.white),
                          //   borderRadius:
                          //   const BorderRadius.all(Radius.circular(50)),
                          // ),
                          child: Row(
                            children: [
                              Text("City Name :"),
                              cityData.isNotEmpty? Container(
                                margin: EdgeInsets.all(20),
                                child: DropdownButton(
                                  // dropdownColor: Color(0xffa4469c),
                                  value:city,
                                  items: cityData.map((value) {
                                    return DropdownMenuItem<String>(
                                      value: value['city_id'],
                                      child: Text(value['city_name']),
                                    );
                                  }).toList(),
                                  onChanged: (val) {
                                    setState(() {
                                      city=val!;
                                      print(val);
                                    });
                                  },
                                ),
                              ):Container(),
                            ],
                          ),
                        ),
                        // Container(
                        //
                        //   child: Row(
                        //     children: [
                        //       Text("City Name :"),
                        //       cityData.isNotEmpty? Container(
                        //         margin: EdgeInsets.all(20),
                        //         child: DropdownButton(
                        //           // dropdownColor: Color(0xffa4469c),
                        //           value:city == null || city.toString().isEmpty? cityData[0]['cart_id']:city,
                        //           items: cityData.map((value) {
                        //             return DropdownMenuItem<String>(
                        //               value: value['cart_id'],
                        //               child: Text(value['city_name']),
                        //             );
                        //           }).toList(),
                        //           onChanged: (val) {
                        //             setState(() {
                        //               city=val!;
                        //               print(city);
                        //             });
                        //           },
                        //         ),
                        //       ):Container(),
                        //     ],
                        //   ),
                        // ),
                        SizedBox(height: 20,),
                        Container(
                            width: MediaQuery.of(context).size.width,
                            // decoration: BoxDecoration(
                            //   border:
                            //   Border.all(width: 1, color: Colors.white),
                            //   borderRadius:
                            //   const BorderRadius.all(Radius.circular(50)),
                            // ),
                            child: Row(
                              children: [
                                Text("Status : "),
                                SizedBox(width: 20),
                                Text("pandding"),
                                SizedBox(width: 5),
                                Radio(
                                  groupValue: status,
                                  value: "pandding",
                                  onChanged: (val){
                                    setState(() {
                                      status = val!;
                                    });
                                  },
                                ),
                                SizedBox(width: 20),
                                Text("paid"),
                                SizedBox(width: 5),
                                Radio(
                                  groupValue: status,
                                  value: "paid",
                                  onChanged: (val){
                                    setState(() {
                                      status = val!;
                                    });
                                  },
                                ),
                              ],
                            )
                        ),
                        SizedBox(height: 20,),

                        Center(
                          child: GestureDetector(
                            onTap: () async{
                              if(addpagekey.currentState!.validate())
                              {

                                print("object1111 = ${widget.myUniqueList}");
                                SharedPreferences prefs =
                                await SharedPreferences.getInstance();

                                var usercontact = prefs.getString("usercontact").toString();
                                var useremail = prefs.getString("useremail").toString();
                                // var amount = 500;

                                var options = {
                                  'key': 'rzp_test_7mhLG9AHF0oCp1',
                                  'amount': finalamount * 100,
                                  'name': 'Nails Spectrum',
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
                                borderRadius: const BorderRadius.all(Radius.circular(15) //
                                ),
                              ),
                              child: Text("Place Order : ₹" + finalamount.toString(),
                                // style: TextStyle(
                                //     fontSize: 20,
                                //     fontFamily:
                                //     color: Color(0xfffbf6fa)
                                // )
                                style:  TextStyle(
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
          ),
        )
    );
  }
}


// import 'package:flutter/material.dart';
//
// class Cartdetailspage extends StatefulWidget {
//   const Cartdetailspage({Key? key}) : super(key: key);
//
//   @override
//   State<Cartdetailspage> createState() => _CartdetailspageState();
// }
//
// class _CartdetailspageState extends State<Cartdetailspage> {
//   var city = "1";
//   @override
//   Widget build(BuildContext context) {
//     return Scaffold(
//       appBar: AppBar(
//         title: Text("Order Page"),
//       ),
//       body: SingleChildScrollView(
//         child: Form(
//           child: Column(
//             children: [
//               Padding(
//                 padding: EdgeInsets.all(15),
//                 child: Column(
//                   children: [
//                     SizedBox(
//                       height: 20,
//                     ),
//                     TextFormField(
//                       // controller: _name,
//                       decoration: InputDecoration(
//                         border: OutlineInputBorder(),
//                         labelText: 'Address',
//                         hintText: 'Enter Your Address',
//                       ),
//
//                     ),
//                     SizedBox(
//                       height: 20,
//                     ),
//                     TextFormField(
//                       // controller: _mno,
//
//                       decoration: InputDecoration(
//                         border: OutlineInputBorder(),
//                         labelText: 'Landmark',
//                         hintText: 'Enter Your Landmark',
//                       ),
//
//                     ),
//                     SizedBox(
//                       height: 20,
//                     ),
//
//                     DecoratedBox(
//                       decoration: BoxDecoration(
//                           color: Colors.blueGrey,
//                           //background color of dropdown button
//                           border: Border.all(color: Colors.black38, width: 3),
//                           //border of dropdown button
//                           borderRadius: BorderRadius.circular(50),
//                           //border raiuds of dropdown button
//                           boxShadow: <BoxShadow>[
//                             //apply shadow on Dropdown button
//                             BoxShadow(
//                                 color: Color.fromRGBO(0, 0, 0, 0.57),
//                                 //shadow for button
//                                 blurRadius: 5) //blur radius of shadow
//                           ]),
//                       child: Padding(
//                         padding: EdgeInsets.only(left: 30, right: 20),
//                         child: DropdownButton(
//                           onChanged: (val) {
//                             setState(() {
//                               city = val!;
//                             });
//                           },
//                           value: city,
//                           items: [
//                             DropdownMenuItem(
//                               child: Text("city : 1"),
//                               value: "1",
//                             ),
//                             DropdownMenuItem(
//                               child: Text("city : 2"),
//                               value: "2",
//                             ),
//                             DropdownMenuItem(
//                               child: Text("city : 3"),
//                               value: "3",
//                             )
//                           ],
//                         ),
//                       ),
//                     ),
//
//                     SizedBox(
//                       height: 20,
//                     ),
//
//
//                     SizedBox(
//                       width: 400,
//                       height: 60,
//                       child: GestureDetector(
//
//
//                         child: Container(
//
//                           decoration: BoxDecoration(
//                             color: Colors.black,
//                             borderRadius: BorderRadius.all(Radius.circular(20)),
//                           ),
//                           padding: EdgeInsets.only(top: 20),
//                           child: Text(
//
//                             "Proceed",
//                             style: TextStyle(
//                               color: Colors.white,
//                               fontSize: 20,
//                             ),
//                             textAlign: TextAlign.center,
//                           ),
//                         ),
//                       ),
//                     ),
//                    ],
//                 ),
//               ),
//             ],
//           ),
//         ),
//       ),
//     );
//   }
// }
