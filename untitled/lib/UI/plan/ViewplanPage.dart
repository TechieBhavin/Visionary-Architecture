import 'package:untitled/UI/plan/ViewplanPage.dart';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

import 'package:untitled/UI/plan/PlanDetailsPage.dart';
import 'package:untitled/UI/resource/UrlResourse.dart';

class ViewplanPage extends StatefulWidget {
  const ViewplanPage({Key? key}) : super(key: key);

  @override
  State<ViewplanPage> createState() => _ViewplanPageState();
}

class _ViewplanPageState extends State<ViewplanPage> {
  late Future<List?> alldata;
  // var urlimg = "http://192.168.43.45/architecture/admin/uploads/architect/";

  Future<List?> getplandata() async {
    Uri uri = Uri.parse(UrlResourse.GETPLAN);
    var responce = await http.get(uri);

    if (responce.statusCode == 200) {
      var body = responce.body.toString();
      var json = jsonDecode(body);
      return json;
    } else {
      print("API error");
    }
  }

  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    setState(() {
      alldata = getplandata();
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(
          title: Text("plans"),
          backgroundColor: Colors.blue,
        ),
        body: FutureBuilder(
          future: alldata,
          builder: (context, snapshot) {
            if (snapshot.hasData) {
              if (snapshot.data!.length <= 0) {
                return Center(
                  child: Text(
                    "No plans",
                    style: TextStyle(
                      fontSize: 20,
                      fontWeight: FontWeight.bold,
                    ),
                  ),
                );
              } else {
                return ListView.builder(
                    // gridDelegate: SliverGridDelegateWithFixedCrossAxisCount(
                    //     crossAxisCount: 2,
                    //     mainAxisSpacing: 10,
                    //     crossAxisSpacing: 10
                    // ),
                    itemCount: snapshot.data!.length,
                    itemBuilder: (context, index) {
                      return GestureDetector(
                        onTap: () {
                          Navigator.of(context).push(MaterialPageRoute(
                              builder: (context) => PlanDetailsPage(
                                    id: snapshot.data![index]["plan_id"]
                                        .toString(),
                                    planname: snapshot.data![index]["plan_name"]
                                        .toString(),
                                    architectname: snapshot.data![index]["name"]
                                        .toString(),
                                    price: snapshot.data![index]["price"]
                                        .toString(),
                                description: snapshot.data![index]["description"]
                                    .toString(),
                                video: snapshot.data![index]["video_url"]
                                    .toString(),
                                  )));
                        },
                        child: Container(
                          width: MediaQuery.of(context).size.width,
                          child: Card(

                            shape: RoundedRectangleBorder(
                              borderRadius: BorderRadius.circular(20.0),
                              side: BorderSide(
                                color: Colors.black
                              )
                            ),
                            child: Column(
                              children: [
                                Container(
                                  width: MediaQuery.of(context).size.width,
                                  height: 110,
                                  child: Column(
                                    children: [
                                      Padding(
                                        padding: const EdgeInsets.all(8.0),
                                        child: Row(
                                          children: [
                                            Text(
                                              "Plan Name :- ",
                                              style: TextStyle(
                                                fontSize: 20,
                                                fontWeight: FontWeight.bold,
                                              ),
                                            ),
                                            Text(
                                              snapshot.data![index]["plan_name"]
                                                  .toString(),
                                              style: TextStyle(
                                                fontSize: 20,
                                                fontWeight: FontWeight.bold,
                                              ),
                                            )
                                          ],
                                        ),
                                      ),
                                      Padding(
                                        padding: const EdgeInsets.all(8.0),
                                        child: Row(
                                          children: [
                                            Text(
                                              "Architect Name :- ",
                                              style: TextStyle(
                                                fontSize: 20,
                                                // fontWeight: FontWeight.bold,
                                              ),
                                            ),
                                            Text(
                                              snapshot.data![index]["name"]
                                                  .toString(),
                                              style: TextStyle(
                                                fontSize: 20,
                                                // fontWeight: FontWeight.bold,
                                              ),
                                            )
                                          ],
                                        ),
                                      ),
                                      Padding(
                                        padding: const EdgeInsets.all(8.0),
                                        child: Row(
                                          children: [
                                            Text(
                                              "Plan Price :-",
                                              style: TextStyle(
                                                fontSize: 20,
                                                // fontWeight: FontWeight.bold,
                                              ),
                                            ),
                                            Text(
                                              snapshot.data![index]["price"]
                                                  .toString(),
                                              style: TextStyle(
                                                fontSize: 20,
                                                // fontWeight: FontWeight.bold,
                                              ),
                                            )
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
                    });
              }
            } else {
              return Center(
                child: CircularProgressIndicator(),
              );
            }
          },
        ));
  }
}
