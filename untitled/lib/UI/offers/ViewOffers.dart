import 'package:untitled/UI/resource/UrlResourse.dart';
import 'package:untitled/ui/offers/ViewOffersDetails.dart';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

class ViewOffers extends StatefulWidget {
  const ViewOffers({Key? key}) : super(key: key);

  @override
  State<ViewOffers> createState() => _ViewOffersState();
}

class _ViewOffersState extends State<ViewOffers> {

  late Future<List?> alldata;

  Future<List?> getofferdata()async{

    Uri uri = Uri.parse(UrlResourse.GET_OFFER);
    var responce = await http.get(uri);

    if(responce.statusCode==200)
    {
      var body = responce.body.toString();
      var json = jsonDecode(body);
      return json;
    }
    else
    {
      print("API error");
    }

  }

  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    setState(() {
      alldata = getofferdata();
    });
  }



  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(
          "Special Offers"
        ),
        backgroundColor: Colors.blue,
      ),
        body:FutureBuilder(
          future: alldata,
          builder: (context,snapshot)
          {
            if(snapshot.hasData)
            {
              if(snapshot.data!.length<=0)
              {
                return Center(child: Text("No Articles"),);
              }
              else
              {
                return ListView.builder(
                    itemCount: snapshot.data!.length,
                    itemBuilder:  (context,index)
                    {
                      return GestureDetector(
                        onTap: () {
                          Navigator.of(context).push(
                              MaterialPageRoute(builder: (context)=>ViewOffersDetails(
                                id: snapshot.data![index]["offer_id"].toString(),
                                name: snapshot.data![index]["offer_name"].toString(),
                                amnt: snapshot.data![index]["min_purchase_amount"].toString(),
                                discount: snapshot.data![index]["discount"].toString(),
                                enddate: snapshot.data![index]["end_date"].toString(),
                                //   description:snapshot.data![index]["description"].toString(),
                                //   coupon_code:snapshot.data![index]["coupon_code"].toString(),



                              ))
                          );
                        },
                        child: Container(
                          width: MediaQuery.of(context).size.width,
                          // color: Colors.grey ,
                          child: Card(
                            // color: Colors.grey,

                            child: Column(
                              children: [

                                Container(
                                  width: MediaQuery.of(context).size.width,
                                  height: 210,

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
                                                  image: AssetImage("assets/images/download.png",),
                                                  fit: BoxFit.cover,
                                                ),
                                              ),
                                            )
                                          // backgroundImage: NetworkImage(urlimg+snapshot.data![index]["img_url"].toString(),),
                                        ),
                                      ),


                                      Padding(
                                        padding: const EdgeInsets.only(left: 8.0),
                                        child: Row(
                                          children: [
                                            Text(snapshot.data![index]["offer_name"].toString(),style: TextStyle(
                                              fontSize: 20,
                                              fontWeight: FontWeight.bold,
                                            ),)
                                          ],
                                        ),
                                      ),
                                      Padding(
                                        padding: const EdgeInsets.only(left: 8.0,),
                                        child: Row(
                                          children: [
                                            Text("min_purchase_amount :-",style: TextStyle(
                                              fontSize: 20,
                                              // fontWeight: FontWeight.bold,
                                            ),),
                                            SizedBox(
                                              width: 10,
                                            ),

                                            Text(snapshot.data![index]["min_purchase_amount"].toString(),style: TextStyle(
                                              fontSize: 20,
                                              // fontWeight: FontWeight.bold,
                                            ),)
                                          ],
                                        ),
                                      ),

                                      Padding(
                                        padding: const EdgeInsets.only(left: 8.0),
                                        child: Row(
                                          children: [
                                            Text("discount :-",style: TextStyle(
                                              fontSize: 20,
                                              // fontWeight: FontWeight.bold,
                                            ),),
                                            SizedBox(
                                              width: 10,
                                            ),

                                            Text(snapshot.data![index]["discount"].toString(),style: TextStyle(
                                              fontSize: 20,
                                              // fontWeight: FontWeight.bold,
                                            ),)
                                          ],
                                        ),
                                      ),




                                    ],
                                  ),

                                )

                              ],
                            ),

                          ),
                        ),
                      );
                    }
                );
              }
            }
            else
            {
              return Center(child: CircularProgressIndicator(),);
            }
          },
        )
    );
  }
}
