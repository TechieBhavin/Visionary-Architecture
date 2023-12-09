import 'package:cached_network_image/cached_network_image.dart';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:untitled/UI/architect/ArchitectProfilePage.dart';
import 'dart:convert';

import 'package:untitled/UI/inquiry/InquiryPage.dart';
import 'package:untitled/UI/plan/ViewplanPage.dart';
import 'package:untitled/UI/portfolio/ViewPortfolioPage.dart';
import 'package:untitled/UI/portfolio/viewportfolio.dart';
import 'package:untitled/UI/resource/UrlResourse.dart';


class ViewArchitectDetailsPage extends StatefulWidget {
  var id;
  var name;
  var contact;
  var specialization;
  var about;
  var profile;
  var email;
  var exp;
  var add;
  var web;




  ViewArchitectDetailsPage({Key? key,

    this.id,
    this.name,
    this.contact,
    this.specialization,
    this.web,
    this.exp,
    this.add,
    this.about,
    this.email,
    this.profile}) : super(key: key);

  @override
  State<ViewArchitectDetailsPage> createState() => _ViewArchitectDetailsPageState();
}

class _ViewArchitectDetailsPageState extends State<ViewArchitectDetailsPage> {

  final List<String> imgList = [
    'https://images.unsplash.com/photo-1520342868574-5fa3804e551c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6ff92caffcdd63681a35134a6770ed3b&auto=format&fit=crop&w=1951&q=80',
    'https://images.unsplash.com/photo-1522205408450-add114ad53fe?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=368f45b0888aeb0b7b08e3a1084d3ede&auto=format&fit=crop&w=1950&q=80',
    'https://images.unsplash.com/photo-1519125323398-675f0ddb6308?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=94a1e718d89ca60a6337a6008341ca50&auto=format&fit=crop&w=1950&q=80',
    'https://images.unsplash.com/photo-1523205771623-e0faa4d2813d?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=89719a0d55dd05e2deae4120227e6efc&auto=format&fit=crop&w=1953&q=80',
    'https://images.unsplash.com/photo-1508704019882-f9cf40e475b4?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=8c6e5e3aba713b17aa1fe71ab4f0ae5b&auto=format&fit=crop&w=1352&q=80',
    'https://images.unsplash.com/photo-1519985176271-adb1088fa94c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a0c8d632e977f94e5d312d9893258f59&auto=format&fit=crop&w=1355&q=80'
  ];

  var urlimg = "http://192.168.43.105/architecture/admin/uploads/architect/";

  getarchitectdata() async {
    Uri uri = Uri.parse(UrlResourse.GETARCHITECT);
    var responce = await http.post(uri, body: {"id": widget.id});

    if (responce.statusCode == 200) {
      var body = responce.body.toString();
      var json = jsonDecode(body);
      // return json;

      // setState(() {
      //   architecttitle = json["name"];
      //   profilepic = json["profile_photo"];
      //   contact = json["contact"];
      //   specialization = json["specialization"];
      // });
    } else {
      print("API error");
    }
  }

  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    getarchitectdata();
  }

  @override
  Widget build(BuildContext context) {
    var snapshot;
    return Scaffold(
      appBar: AppBar(
        title: Text(widget.name),
        backgroundColor: Colors.blue,
      ),
      body: SingleChildScrollView(
        // child: Container(
        //   height: MediaQuery
        //       .of(context)
        //       .size
        //       .height,
        //   margin: EdgeInsets.only(top: 20,left: 10,right: 10),
        //   padding: EdgeInsets.all(10),
        //   width: MediaQuery
        //       .of(context)
        //       .size
        //       .width,
        //   decoration: BoxDecoration(
        //       color: Colors.grey.shade200,
        //       borderRadius: BorderRadius.circular(5.0)),
        //   child: Column(
        //     crossAxisAlignment: CrossAxisAlignment.start,
        //     children: [
        //       SizedBox(
        //         height: 10,
        //       ),
        //       Row(
        //         children: [
        //           Container(
        //             alignment: Alignment.topLeft,
        //             child: CircleAvatar(
        //                 radius: 50,
        //                 backgroundImage: AssetImage("assets/images/profile.png",)
        //
        //             ),
        //           ),
        //           SizedBox(
        //             width: 10,
        //           ),
        //           Container(
        //             width: 240,
        //             alignment: Alignment.topRight,
        //             decoration: BoxDecoration(
        //               borderRadius: BorderRadius.circular(10),
        //               color: Colors.white24,
        //               border: Border.all(
        //                 color: Colors.grey,
        //                 width: 2,
        //               ),
        //             ),
        //             child: Column(
        //               children: [
        //                 Padding(
        //                   padding: const EdgeInsets.all(8.0),
        //                   child: Row(
        //                     children: [
        //                       Text(
        //                         "Name :-",
        //                         style: TextStyle(
        //                           fontSize: 15,
        //                           fontWeight: FontWeight.bold,
        //                         ),
        //                       ),
        //                       SizedBox(
        //                         width: 10,
        //                       ),
        //                       Text(
        //                         widget.name,
        //                         style: TextStyle(
        //                           fontSize: 15,
        //                           fontWeight: FontWeight.bold,
        //                         ),
        //                       )
        //                     ],
        //                   ),
        //                 ),
        //                 Padding(
        //                   padding: const EdgeInsets.all(8.0),
        //                   child: Row(
        //                     children: [
        //                       Text(
        //                         "Mobile No. :-",
        //                         style: TextStyle(
        //                           fontSize: 15,
        //                           fontWeight: FontWeight.bold,
        //                         ),
        //                       ),
        //                       SizedBox(
        //                         width: 10,
        //                       ),
        //                       Text(
        //                         widget.contact,
        //                         style: TextStyle(
        //                           fontSize: 15,
        //                           fontWeight: FontWeight.bold,
        //                         ),
        //                       )
        //                     ],
        //                   ),
        //                 ),
        //                 Padding(
        //                   padding: const EdgeInsets.all(8.0),
        //                   child: Row(
        //                     children: [
        //                       Text(
        //                         "E-Mail :-",
        //                         style: TextStyle(
        //                           fontSize: 15,
        //                           fontWeight: FontWeight.bold,
        //                         ),
        //                       ),
        //                       SizedBox(
        //                         width: 10,
        //                       ),
        //                       Text(
        //                         widget.email,
        //                         style: TextStyle(
        //                           fontSize: 15,
        //                           fontWeight: FontWeight.bold,
        //                         ),
        //                       )
        //                     ],
        //                   ),
        //                 ),
        //                 Padding(
        //                   padding: const EdgeInsets.all(8.0),
        //                   child: Row(
        //                     children: [
        //                       Text(
        //                         "Specialization :-",
        //                         style: TextStyle(
        //                           fontSize: 15,
        //                           fontWeight: FontWeight.bold,
        //                         ),
        //                       ),
        //                       SizedBox(
        //                         width: 10,
        //                       ),
        //                       Text(
        //                         widget.specialization,
        //                         style: TextStyle(
        //                           fontSize: 15,
        //                           fontWeight: FontWeight.bold,
        //                         ),
        //                       )
        //                     ],
        //                   ),
        //                 ),
        //               ],
        //             ),
        //           ),
        //         ],
        //       ),
        //       SizedBox(height: 20,),
        //
        //
        //       Card(
        //         child: Column(
        //           children: [
        //             Padding(
        //               padding: const EdgeInsets.all(8.0),
        //               child: Row(
        //                 children: [
        //                   Text("Experience :-", style: TextStyle(
        //                     fontSize: 15,
        //                     fontWeight: FontWeight.bold,
        //                   ),
        //                   ),
        //                   SizedBox(
        //                     width: 10,
        //                   ),
        //
        //                   Text(widget.exp, style: TextStyle(
        //                     fontSize: 15,
        //                     fontWeight: FontWeight.bold,
        //                   ),)
        //                 ],
        //               ),
        //             ),
        //             Padding(
        //               padding: const EdgeInsets.all(8.0),
        //               child: Row(
        //                 children: [
        //                   Text("Website :-",style: TextStyle(
        //                     fontSize: 15,
        //                     fontWeight: FontWeight.bold,
        //                   ),),
        //                   SizedBox(
        //                     width: 10,
        //                   ),
        //
        //                   Text(widget.web,style: TextStyle(
        //                     fontSize: 15,
        //                     fontWeight: FontWeight.bold,
        //                   ),)
        //                 ],
        //               ),
        //             ),
        //             Padding(
        //               padding: const EdgeInsets.all(8.0),
        //               child: Row(
        //                 children: [
        //                   Text("Address :-",style: TextStyle(
        //                     fontSize: 15,
        //                     fontWeight: FontWeight.bold,
        //                   ),),
        //                   SizedBox(
        //                     width: 10,
        //                   ),
        //
        //                   Text(widget.add,style: TextStyle(
        //                     fontSize: 15,
        //                     fontWeight: FontWeight.bold,
        //                   ),)
        //                 ],
        //               ),
        //             ),
        //             Padding(
        //               padding: const EdgeInsets.all(8.0),
        //               child: Row(
        //                 children: [
        //                   Text("About :-",style: TextStyle(
        //                     fontSize: 15,
        //                     fontWeight: FontWeight.bold,
        //                   ),),
        //                   SizedBox(
        //                     width: 10,
        //                   ),
        //
        //                   Text(widget.about,style: TextStyle(
        //                     fontSize: 15,
        //                     fontWeight: FontWeight.bold,
        //                   ),)
        //                 ],
        //               ),
        //             ),
        //
        //           ],
        //         ),
        //       ),
        //
        //       SizedBox(height: 20,),
        //
        //       Container(
        //         child: Row(
        //           children: [
        //             SizedBox(
        //               width: 5,
        //             ),
        //             SizedBox(
        //               width: 150,
        //               height: 60,
        //               child: GestureDetector(
        //                 // onTap: () {
        //                 //   Navigator.of(context).push(MaterialPageRoute(
        //                 //       builder: (context) => ViewPortfolio()));
        //                 // },
        //                 child: Container(
        //                   decoration: BoxDecoration(
        //                     color: Colors.black,
        //                     borderRadius: BorderRadius.all(Radius.circular(10)),
        //                   ),
        //                   padding: EdgeInsets.only(top: 20),
        //                   child: Text(
        //                     "Portfolio",
        //                     style: TextStyle(
        //                       color: Colors.white,
        //                       fontSize: 20,
        //                     ),
        //                     textAlign: TextAlign.center,
        //                   ),
        //                 ),
        //               ),
        //             ),
        //
        //             SizedBox(
        //               width: 45,
        //             ),
        //             SizedBox(
        //               height: 10,
        //             ),
        //             SizedBox(
        //               width: 150,
        //               height: 60,
        //               child: GestureDetector(
        //                 onTap: () {
        //                   Navigator.of(context).push(MaterialPageRoute(
        //                       builder: (context) => InquiryPage()));
        //                 },
        //                 child: Container(
        //                   decoration: BoxDecoration(
        //                     color: Colors.black,
        //                     borderRadius: BorderRadius.all(Radius.circular(10)),
        //                   ),
        //                   padding: EdgeInsets.only(top: 20),
        //                   child: Text(
        //                     "Inquiry",
        //                     style: TextStyle(
        //                       color: Colors.white,
        //                       fontSize: 20,
        //                     ),
        //                     textAlign: TextAlign.center,
        //                   ),
        //                 ),
        //               ),
        //             ),
        //           ],
        //         ),
        //       )
        //     ],
        //   ),
        // ),

        child: Container(
          width: MediaQuery.of(context).size.width,
          height: 2000,

          child: Column(
                children:<Widget> [

                  Align(
                    alignment: Alignment.topLeft,

                    child: Card(
                        child: Container(
                          alignment: Alignment.topLeft,
                          height:200,
                          width: MediaQuery.of(context).size.width,
                          decoration: BoxDecoration(
                            image: DecorationImage(
                              image: AssetImage("assets/images/architect2.png",),
                              fit: BoxFit.cover,
                            ),
                          ),
                        )
                      // backgroundImage: NetworkImage(urlimg+snapshot.data![index]["img_url"].toString(),),
                    ),
                  ),
                  SizedBox(height: 10,),
                  Row(

                    children: [
                      Container(
                        alignment: Alignment.topLeft,
                        child: CircleAvatar(
                            radius: 40,
                            backgroundImage: AssetImage("assets/images/profile.png",)

                        ),
                      ),
                      SizedBox(
                        width: 10,
                      ),


                      Container(
                        width: 240,
                        alignment: Alignment.topRight,
                        decoration: BoxDecoration(
                          borderRadius: BorderRadius.circular(10),
                          color: Colors.white24,

                        ),
                        child: Column(
                          children: [
                            Padding(
                              padding: const EdgeInsets.all(5.0),
                              child: Row(
                                children: [
                                  Text(
                                    widget.name,
                                    style: TextStyle(
                                      fontSize: 15,
                                      fontWeight: FontWeight.bold,
                                    ),
                                  )
                                ],
                              ),
                            ),
                            Padding(
                              padding: const EdgeInsets.all(5.0),
                              child: Row(
                                children: [
                                  Text(
                                    "Mobile No. :-",
                                    style: TextStyle(
                                      fontSize: 15,
                                      // fontWeight: FontWeight.bold,
                                    ),
                                  ),
                                  SizedBox(
                                    width: 10,
                                  ),
                                  Text(
                                    widget.contact,
                                    style: TextStyle(
                                      fontSize: 15,
                                      // fontWeight: FontWeight.bold,
                                    ),
                                  )
                                ],
                              ),
                            ),
                            Padding(
                              padding: const EdgeInsets.all(5.0),
                              child: Row(
                                children: [
                                  Text(
                                    "E-Mail :-",
                                    style: TextStyle(
                                      fontSize: 15,
                                      // fontWeight: FontWeight.bold,
                                    ),
                                  ),
                                  SizedBox(
                                    width: 10,
                                  ),
                                  Text(
                                    widget.email,
                                    style: TextStyle(
                                      fontSize: 15,
                                      // fontWeight: FontWeight.bold,
                                    ),
                                  )
                                ],
                              ),
                            ),
                            Padding(
                              padding: const EdgeInsets.all(5.0),
                              child: Row(
                                children: [
                                  Text(
                                    "experience	 :-",
                                    style: TextStyle(
                                      fontSize: 15,
                                      // fontWeight: FontWeight.bold,
                                    ),
                                  ),
                                  SizedBox(
                                    width: 10,
                                  ),
                                  Text(
                                    widget.exp,
                                    style: TextStyle(
                                      fontSize: 15,
                                      // fontWeight: FontWeight.bold,
                                    ),
                                  )
                                ],
                              ),
                            ),
                          ],
                        ),
                      ),
                    ],
                  ),


                  Row(
                    mainAxisAlignment: MainAxisAlignment.spaceBetween,
                    children: <Widget>[
                      Padding(
                        padding: EdgeInsets.only(
                             left: 8.0, right: 8.0),
                        child: Text('Popular Portfolios',
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
                            onPressed: () {
                              Navigator.of(context).push(
                                  MaterialPageRoute(builder: (context) => viewportfolio(id:widget.id)));
                            },

                            child: Text('View All',
                                style: TextStyle(color: Colors.white)),
                            ),
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
                                  onTap: () {
                                    Navigator.pushNamed(
                                        context, '/products',
                                        arguments: i);
                                  },
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
                                          'Two Gold Rings',
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

                  Align(
                    alignment: Alignment.topLeft,

                    child: Card(
                        child: Container(
                          alignment: Alignment.topLeft,
                          height:200,
                          width: MediaQuery.of(context).size.width,
                          decoration: BoxDecoration(
                            image: DecorationImage(
                              image: AssetImage("assets/images/architect2.png",),
                              fit: BoxFit.cover,
                            ),
                          ),
                        )
                      // backgroundImage: NetworkImage(urlimg+snapshot.data![index]["img_url"].toString(),),
                    ),
                  ),

                  Row(
                    mainAxisAlignment: MainAxisAlignment.spaceBetween,
                    children: <Widget>[
                      Padding(
                        padding: EdgeInsets.only(
                            left: 8.0, right: 8.0),
                        child: Text('Popular Plans',
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
                          onPressed: () {
                            Navigator.of(context).push(
                                MaterialPageRoute(builder: (context) => ViewplanPage()));
                          },

                          child: Text('View All',
                              style: TextStyle(color: Colors.white)),
                        ),
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
                                  onTap: () {
                                    Navigator.pushNamed(
                                        context, '/products',
                                        arguments: i);
                                  },
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
                                          'Two Gold Rings',
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
      ),
    );
  }
}
