import 'package:cached_network_image/cached_network_image.dart';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

import 'package:untitled/UI/offers/ViewOffers.dart';
class ViewOffersDetails extends StatefulWidget {

  var id;
  var name;
  var amnt;
  var discount;
  var enddate;
  // var description;
  // var coupon_code;

  ViewOffersDetails({Key? key,

    this.id,
    this.name,
    this.amnt,
    this.discount,
    this.enddate,
    // th, required String offer, required String end_date, required String min_purchase_amount_name, required String offer_nameis.description,
    // this.coupon_code,


  }) : super(key: key);

  @override
  State<ViewOffersDetails> createState() => _ViewOffersDetailsState();
}

class _ViewOffersDetailsState extends State<ViewOffersDetails> {


  var offertitle="";

  getofferdata()async{

    Uri uri = Uri.parse("http://192.168.43.105/api/offersdetails.php");
    var responce = await http.post(uri,body: {"id":widget.id});

    if(responce.statusCode==200)
    {
      var body = responce.body.toString();
      var json = jsonDecode(body);
      // return json;

      setState(() {
        offertitle = json["title"];
      });

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
    getofferdata();
  }

  final List<String> imgList = [
    'https://images.unsplash.com/photo-1522205408450-add114ad53fe?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=368f45b0888aeb0b7b08e3a1084d3ede&auto=format&fit=crop&w=1950&q=80',
    'https://images.unsplash.com/photo-1522205408450-add114ad53fe?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=368f45b0888aeb0b7b08e3a1084d3ede&auto=format&fit=crop&w=1950&q=80',
    'https://images.unsplash.com/photo-1519125323398-675f0ddb6308?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=94a1e718d89ca60a6337a6008341ca50&auto=format&fit=crop&w=1950&q=80',
    'https://images.unsplash.com/photo-1523205771623-e0faa4d2813d?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=89719a0d55dd05e2deae4120227e6efc&auto=format&fit=crop&w=1953&q=80',
    'https://images.unsplash.com/photo-1508704019882-f9cf40e475b4?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=8c6e5e3aba713b17aa1fe71ab4f0ae5b&auto=format&fit=crop&w=1352&q=80',
    'https://images.unsplash.com/photo-1519985176271-adb1088fa94c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a0c8d632e977f94e5d312d9893258f59&auto=format&fit=crop&w=1355&q=80'
  ];
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("Offer Details"),
        backgroundColor: Colors.blue,
      ),
      body: SingleChildScrollView(
        child: Column(
          children:<Widget> [

            SizedBox(height: 10,width: 10,),
            Align(
              alignment: Alignment.topLeft,
              // child: Image.network(urlimg+snapshot.data![index]["cat_icon"].toString(),height: 20,width: 40,)

              child: Card(
                  child: Container(
                    alignment: Alignment.topLeft,
                    height:150,
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

            SizedBox(height: 20,),
            Padding(
              padding: const EdgeInsets.only(left: 8.0),
              child: Row(
                children: [
                  Text(widget.name.toString(),style: TextStyle(
                    fontSize: 20,
                    fontWeight: FontWeight.bold,
                  ),)
                ],
              ),
            ),
            Padding(
              padding: const EdgeInsets.only(left: 8.0),
              child: Row(
                children: [
                  Text("min_purchase_amount :-",style: TextStyle(
                    fontSize: 20,
                    // fontWeight: FontWeight.bold,
                  ),),
                  SizedBox(
                    width: 10,
                  ),

                  Text(widget.amnt,style: TextStyle(
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

                  Text(widget.discount,style: TextStyle(
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
                  Text("end_date :-",style: TextStyle(
                    fontSize: 20,
                    // fontWeight: FontWeight.bold,
                  ),),
                  SizedBox(
                    width: 10,
                  ),

                  Text(widget.enddate,style: TextStyle(
                    fontSize: 20,
                    // fontWeight: FontWeight.bold,
                  ),)

                ],
              ),
            ),
            // Padding(
            //   padding: const EdgeInsets.all(8.0),
            //   child: Row(
            //     children: [
            //       Text("description :-",style: TextStyle(
            //         fontSize: 20,
            //         // fontWeight: FontWeight.bold,
            //       ),),
            //       SizedBox(
            //         width: 10,
            //       ),
            //
            //       Container(
            //         width: MediaQuery.of(context).size.width /1.50,
            //         // color: Colors.cyan,
            //         child:  Text(widget.description,
            //           maxLines: 4,
            //           style: TextStyle(
            //
            //             fontSize: 20,
            //             // fontWeight: FontWeight.bold,
            //           ),),
            //       )
            //
            //     ],
            //   ),
            // ),
            // Padding(
            //   padding: const EdgeInsets.all(8.0),
            //   child: Row(
            //     children: [
            //       Text("coupon code :-",style: TextStyle(
            //         fontSize: 20,
            //         // fontWeight: FontWeight.bold,
            //       ),),
            //       SizedBox(
            //         width: 10,
            //       ),
            //
            //       Text(widget.coupon_code,style: TextStyle(
            //         fontSize: 20,
            //         // fontWeight: FontWeight.bold,
            //       ),)
            //
            //     ],
            //   ),
            // ),

            Divider(
              height: 20,
              color: Colors.black,
              thickness: 3,
              // indent : 10,
              // endIndent : 10,
            ),

            Row(
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: <Widget>[
                Padding(
                  padding: EdgeInsets.only(
                      top: 8.0, left: 8.0, right: 8.0),
                  child: Text('Best Offers',
                      style: TextStyle(
                          color: Theme.of(context).colorScheme.secondary,
                          fontSize: 18,
                          fontWeight: FontWeight.w700)),
                ),
                Padding(
                  padding: const EdgeInsets.only(
                      right: 8.0, top: 8.0, left: 8.0),
                  child: ElevatedButton(
                      style: ElevatedButton.styleFrom(
                          primary: Theme.of(context).primaryColor
                      ),
                      child: Text('View All',
                          style: TextStyle(color: Colors.white)),
                      onPressed: () {
                        Navigator.of(context).push(
                            MaterialPageRoute(builder: (context) => ViewOffers()));
                      }),
                )
              ],
            ),

            Container(
              margin: EdgeInsets.symmetric(vertical: 8.0),
              height: 240.0,
              child: ListView(
                scrollDirection: Axis.horizontal,
                children: imgList.map((i) {
                  return Builder(
                    builder: (BuildContext context) {
                      return Container(
                        width: 140.0,
                        child: Card(
                          clipBehavior: Clip.antiAlias,
                          child: InkWell(
                            // onTap: () {
                            //   Navigator.pushNamed(
                            //       context, '/products',
                            //       arguments: i);
                            // },
                            child: Column(
                              crossAxisAlignment:
                              CrossAxisAlignment.start,
                              children: <Widget>[
                                SizedBox(
                                  height: 160,
                                  child: Hero(
                                    tag: '$i',
                                    child: CachedNetworkImage(
                                      fit: BoxFit.cover,
                                      imageUrl: i,
                                      placeholder: (context, url) =>
                                          Center(
                                              child:
                                              CircularProgressIndicator()),
                                      errorWidget:
                                          (context, url, error) =>
                                      new Icon(Icons.error),
                                    ),
                                  ),
                                ),
                                ListTile(
                                  title: Text(
                                    'Best Offer',
                                    style: TextStyle(fontSize: 14),
                                  ),
                                  subtitle: Text('\$200',
                                      style: TextStyle(
                                          color: Theme.of(context)
                                              .colorScheme.secondary,
                                          fontWeight:
                                          FontWeight.w700)),
                                )
                              ],
                            ),
                          ),
                        ),
                      );
                    },
                  );
                }).toList(),
              ),
            ),

          ],
        ),
      ),
    );
  }
}
