
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

import 'package:shared_preferences/shared_preferences.dart';
import 'package:untitled/UI/orders/VieworderPage1.dart';

import '../orders/VieworderPage.dart';
import '../resource/UrlResourse.dart';

class ViewCartPage extends StatefulWidget {
  const ViewCartPage({Key? key}) : super(key: key);

  @override
  State<ViewCartPage> createState() => _ViewCartPageState();
}

class _ViewCartPageState extends State<ViewCartPage> {

  // architecture/seller/uploads/product/
  var imgurl = UrlResourse.productimgurl;
  Future<List?>? alldata;
  Future<List?>? getdata() async {

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
  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    getAll();
    // getAllqty();
  }
  List myUniqueList =[];
  getAll()async{
    getdata();
    List? getAllid = [];
    List<dynamic>? _allData =await getdata();
    _allData!.forEach((element) {
      getAllid.add(element['pid']);

    });
   setState(() {
     myUniqueList = getAllid.toSet().toList();
   });

  }
  // List myqtyList =[];
  // getAllqty()async{
  //   getdata();
  //   List? getAllid = [];
  //   List<dynamic>? _allData =await getdata();
  //   _allData!.forEach((element) {
  //     getAllid.add(element['qty']);
  //
  //   });
  //   setState(() {
  //     myqtyList = getAllid.toSet().toList();
  //   });
  //
  // }


  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("View Cart"),
      ),
      // appBar: CustomAppBar(title: 'View Cart',leading: IconButton(
      //   onPressed: (){
      //     // Navigator.of(context).push(
      //     //     MaterialPageRoute(builder: (context)=>BottomNavigationScreen())
      //     // );
      //   },
      //   color: Colors.white,
      //   icon: Icon(Icons.arrow_back_rounded),
      // ),),
      body: FutureBuilder(
        future: getdata(),

        builder: (context, snapshot) {
          if (snapshot.hasData) {
            print("object");
            if (snapshot.data!.length <= 0) {
              return Center(
                child: Text("No Data"),
              );
            } else {
              return
                ListView.builder(
                  physics: const BouncingScrollPhysics(),
                  padding: const EdgeInsets.symmetric(horizontal: 5, vertical: 20),



                  itemCount: snapshot.data!.length,
                  itemBuilder: (context, index) {
                    return Container(
                      // height: 160,
                      // margin: EdgeInsets.all(5),
                      width: MediaQuery.of(context).size.width,
                      child: Card(
                          elevation: 20,
                          child:Row(
                            children: [
                              // Container(
                              //   color: Colors.green,
                              //   margin: EdgeInsets.all(10),
                              //   child: Image.network(imgurl+snapshot.data![index]["img1"].toString(),width: 100,),
                              // ),
                              Container(
                                  width: 200,
                                  // color: Colors.green,
                                  // margin: EdgeInsets.only(left: 20,right: 20),
                                  padding: const EdgeInsets.all(10.0),
                                  child:Column(
                                    children: [
                                      Align(
                                        alignment: Alignment.topLeft,
                                        child:  Text(snapshot.data![index]["title"].toString(),style: TextStyle(
                                          fontSize: 18,
                                          fontWeight: FontWeight.w600,
                                          letterSpacing: 1.2,
                                          color: Color(0xffa4469c),
                                        ),
                                          maxLines: 5,
                                        ),
                                      ),
                                      SizedBox(height: 15,),
                                      Align(
                                        alignment: Alignment.topLeft,
                                        child:  Text("₹"+snapshot.data![index]["price"].toString(),style: TextStyle(
                                          fontSize: 15,
                                          fontWeight: FontWeight.w600,
                                          letterSpacing: 1.2,
                                          color: Colors.black45,
                                        ),
                                          maxLines: 5,
                                        ),
                                      ),



                                      SizedBox(height: 15,),
                                      Align(
                                        alignment: Alignment.topLeft,
                                        child:  Text("Qty : "+snapshot.data![index]["qty"].toString(),style: TextStyle(
                                          fontSize: 15,
                                          fontWeight: FontWeight.w600,
                                          letterSpacing: 1.2,
                                          color: Colors.black45,
                                        ),
                                          maxLines: 5,
                                        ),
                                      )
                                    ],
                                  )
                              ),



                            ],
                          )
                      ),
                    );
                  },
                );
            }
          } else {

            return Center(
              child: Text("No Products in your cart"),
            );
          }
        },
      ),
      bottomNavigationBar: Container(
        margin: EdgeInsets.all(15),
        child: ElevatedButton(
          onPressed: (){
            Navigator.of(context).push(
                MaterialPageRoute(builder: (context)=>PlaceOrder(productid:myUniqueList,))
            );
          },
          child: Text("Check Out"),
        ),
      ),
    );
  }
}
