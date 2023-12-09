import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

import 'package:untitled/UI/resource/UrlResourse.dart';

class VieworderPage extends StatefulWidget {
  const VieworderPage({Key? key}) : super(key: key);

  @override
  State<VieworderPage> createState() => _VieworderPageState();
}

class _VieworderPageState extends State<VieworderPage> {

   Future<List?>? alldata;
  var urlimg = "http://192.168.43.105/architecture/admin/uploads/category/";
  Future<List?> getorderdata()async{

    Uri uri = Uri.parse(UrlResourse.GETORDER);
    var responce = await http.get(uri);

    print("responce = ${responce}");


    if(responce.statusCode==200)
    {
      var body = responce.body.toString();
      print("body = ${body}");
      var json = jsonDecode(body);
      return json;

      // print(json["data"]);
      // print(json["data"]);
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
      alldata = getorderdata();
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(

        appBar: AppBar(title: Text("orders"),backgroundColor: Colors.blueGrey,),

        body: FutureBuilder(
          future: alldata,
          builder: (context, snapshot) {
            if (snapshot.hasData) {
              if (snapshot.data!.length <= 0) {
                return Center(
                  child: Text(
                    "No orders",
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
                                              snapshot.data![index]["address"]
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
                                              "total payment :- ",
                                              style: TextStyle(
                                                fontSize: 20,
                                                // fontWeight: FontWeight.bold,
                                              ),
                                            ),
                                            Text(
                                              snapshot.data![index]["total_payment"]
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
                                              "offer :-",
                                              style: TextStyle(
                                                fontSize: 20,
                                                // fontWeight: FontWeight.bold,
                                              ),
                                            ),
                                            Text(
                                              snapshot.data![index]["title"]
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
