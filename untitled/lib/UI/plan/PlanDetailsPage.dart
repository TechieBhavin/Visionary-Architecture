
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:razorpay_flutter/razorpay_flutter.dart';
import 'dart:convert';

import 'package:shared_preferences/shared_preferences.dart';
import 'package:untitled/UI/plan/ViewplanPage.dart';



class PlanDetailsPage extends StatefulWidget {

  var id;
  var planname;
  var architectname;
  var price;
  var description;
  var video;


  PlanDetailsPage({Key? key, this.id,
    this.planname,
    this.description,
    this.video,
    this.architectname,this.price}) : super(key: key);

  @override
  State<PlanDetailsPage> createState() => _PlanDetailsPageState();


}

class _PlanDetailsPageState extends State<PlanDetailsPage> {

  Razorpay _razorpay = Razorpay();

  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    print("id = ${widget.id}");
    print("price = ${widget.price}");

    _razorpay = Razorpay();
    _razorpay?.on(Razorpay.EVENT_PAYMENT_SUCCESS, _handlePaymentSuccess);
    _razorpay?.on(Razorpay.EVENT_PAYMENT_ERROR, _handlePaymentError);
    _razorpay?.on(Razorpay.EVENT_EXTERNAL_WALLET, _handleExternalWallet);
    // getdata();
  }

  var pid;
  var pprice;
  void _handlePaymentSuccess(PaymentSuccessResponse paymentresponse) async {
    // var ars = address.text.toString();
    // var land = landmark.text.toString();
    // var pin = pincode.text.toString();
    // var cityid;
    // if(city == null)
    // {
    //   setState(() {
    //     cityid = city['city_id'].toString();
    //   });
    // }else{
    //   setState(() {
    //     cityid =cityData[0]['city_id'].toString();
    //   });
    // }
    //
    // var sts = status.toString();
    //


    SharedPreferences prefs = await SharedPreferences.getInstance();

    var userid = prefs.getString("userid").toString();

    print("id = ${widget.id}");
    print("price = ${widget.price}");

    print("aa = ${paymentresponse.paymentId}");
    print("aa = ${paymentresponse.orderId}");
    print("aa = ${paymentresponse.signature}");
    // print(pw);

    Map<String, dynamic> prafm = {
      "userid": userid,
      "planid": widget.id,
      "amount": widget.price,
      "ispay": "Yes",
      "transno": paymentresponse.paymentId,
      "status": "Done",
      "paymode":"Online",
    };
    print("data = ${prafm}");
    Uri uri = Uri.parse("http://192.168.29.64:8012/architectapi/planpurches.php");
    var responce = await http.post(uri, body: prafm);
    print("responce = ${responce.statusCode}");
    if (responce.statusCode == 200) {

      print("responce = ${responce}");

      // var body = jsonDecode(responce.body.toString());


      var body = responce.body.toString();
      var json = jsonDecode(body);
      print("body = ${body}");
      print("json = ${json}");

      if (json['status'] == "true") {
        print("Payment successfully");
        Navigator.of(context).push(
            MaterialPageRoute(builder: (context) => ViewplanPage()));
      } else {
        print("not Payment");
      }
    } else {
      print("api error");
    }
  }

  void _handlePaymentError(PaymentFailureResponse response) {
    // Do something when payment fails

    print("demo");
  }

  void _handleExternalWallet(ExternalWalletResponse response) {
    // Do something when an external wallet was selected
    print("test");
  }
  @override
  Widget build(BuildContext context) {
    return  Scaffold(
      appBar: AppBar(
        title: Text("Plan Details"),
        backgroundColor: Colors.blueGrey,
      ),
      body: SingleChildScrollView(
        child: Container(
          width: MediaQuery.of(context).size.width,
          // color: Colors.grey ,
          child: Card(
            // color: Colors.grey,

            child: Column(
              children: [

                Container(
                  width: MediaQuery.of(context).size.width,
                  height: MediaQuery.of(context).size.height,

                  child: Column(

                    children:<Widget> [

                      SizedBox(height: 10,width: 10,),
                      Align(
                        alignment: Alignment.topLeft,

                        child: Card(
                            child: Container(
                              alignment: Alignment.topLeft,
                              height:130,
                              width: MediaQuery.of(context).size.width,
                              decoration: BoxDecoration(
                                image: DecorationImage(
                                  image: AssetImage("image/plan.png",),
                                  fit: BoxFit.cover,
                                ),
                              ),
                            )
                          // backgroundImage: NetworkImage(urlimg+snapshot.data![index]["img_url"].toString(),),
                        ),
                      ),


                      Padding(
                        padding: const EdgeInsets.all(8.0),
                        child: Row(
                          children: [
                            Text(widget.planname.toString(),style: TextStyle(
                              fontSize: 20,
                              fontWeight: FontWeight.bold,
                            ),)
                          ],
                        ),
                      ),
                      Padding(
                        padding: const EdgeInsets.all(8.0),
                        child: Row(
                          children: [
                            Text("Architect Name :-",style: TextStyle(
                              fontSize: 20,
                              // fontWeight: FontWeight.bold,
                            ),),
                            SizedBox(
                              width: 10,
                            ),

                            Text(widget.architectname.toString(),style: TextStyle(
                              fontSize: 20,
                              // fontWeight: FontWeight.bold,
                            ),)
                          ],
                        ),
                      ),

                      Padding(
                        padding: const EdgeInsets.all(8.0),
                        child: Row(
                          children: [
                            Text("description :-",style: TextStyle(
                              fontSize: 20,
                              // fontWeight: FontWeight.bold,
                            ),),
                            SizedBox(
                              width: 10,
                            ),

                            Text(widget.description.toString(),style: TextStyle(
                              fontSize: 20,
                              // fontWeight: FontWeight.bold,
                            ),)
                          ],
                        ),
                      ),
                      Padding(
                        padding: const EdgeInsets.all(8.0),
                        child: Row(
                          children: [
                            Text("video_url :-",style: TextStyle(
                              fontSize: 20,
                              // fontWeight: FontWeight.bold,
                            ),),
                            SizedBox(
                              width: 10,
                            ),

                            Text(widget.video.toString(),style: TextStyle(
                              fontSize: 20,
                              // fontWeight: FontWeight.bold,
                            ),)
                          ],
                        ),
                      ),
                      Padding(
                        padding: const EdgeInsets.all(8.0),
                        child: Row(
                          children: [
                            Text("Price :-",style: TextStyle(
                              fontSize: 20,
                              // fontWeight: FontWeight.bold,
                            ),),
                            SizedBox(
                              width: 10,
                            ),

                            Text(widget.price.toString(),style: TextStyle(
                              fontSize: 20,
                              // fontWeight: FontWeight.bold,
                            ),)
                          ],
                        ),
                      ),
                      SizedBox(
                        width: 100,
                        height: 60,
                        child: GestureDetector(

                          onTap: () async {

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
                                'key': 'rzp_test_07lmOmPEdlPCS2',
                                'amount': num.parse(widget.price) * 100,
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

                          },

                          child: Container(
                            decoration: BoxDecoration(
                              color: Colors.black,
                              borderRadius: BorderRadius.all(Radius.circular(10)),
                            ),
                            padding: EdgeInsets.only(top: 20),
                            child: Text(
                              "Buy",
                              style: TextStyle(
                                color: Colors.white,
                                fontSize: 20,
                              ),
                              textAlign: TextAlign.center,
                            ),
                          ),
                        ),
                      ),




                    ],
                  ),

                )

              ],
            ),

          ),
        ),


      ),
    );
  }
}
