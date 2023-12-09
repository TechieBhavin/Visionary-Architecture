import 'dart:convert';
import 'package:http/http.dart' as http;
import 'package:flutter/material.dart';
import 'package:untitled/UI/architect/ViewArchitectDetailsPage.dart';
import 'package:untitled/UI/resource/UrlResourse.dart';

class ViewArchitectPage extends StatefulWidget {
  const ViewArchitectPage({Key? key}) : super(key: key);

  @override
  State<ViewArchitectPage> createState() => _ViewArchitectPageState();
}

class _ViewArchitectPageState extends State<ViewArchitectPage> {

  late Future<List?> alldata;
  // var urlimg = "http://192.168.43.105/architecture/admin/uploads/architect/";
  Future<List?> getarchitectdata()async{

    Uri uri = Uri.parse(UrlResourse.GETARCHITECT);
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
      alldata = getarchitectdata();
    });
  }


  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(title: Text("Polupar Architects",), backgroundColor: Colors.blue,),

        body:FutureBuilder(
          future: alldata,

          builder: (context,snapshot)
          {
            // print("object1");
            print("object : "+alldata.toString());
            if(snapshot.hasData)
            {


              if(snapshot.data!.length<=0)
              {
                return Center(child: Text("No Architects"),);
              }
              else
              {

                return ListView.builder(
                    itemCount: snapshot.data!.length,
                    itemBuilder:  (context,index)
                    {
                      return GestureDetector(
                        onTap: (){
                          Navigator.of(context).push(
                              MaterialPageRoute(builder: (context)=>ViewArchitectDetailsPage(id: snapshot.data![index]["architect_id"].toString(),
                                name:snapshot.data![index]["name"].toString(),
                                contact:snapshot.data![index]["contact"].toString(),
                                specialization:snapshot.data![index]["specialization"].toString(),
                                profile:snapshot.data![index]["profile_photo"].toString(),
                                about:snapshot.data![index]["about_us"].toString(),
                                email:snapshot.data![index]["email"].toString(),
                                exp:snapshot.data![index]["experience"].toString(),
                                web:snapshot.data![index]["website"].toString(),
                                add:snapshot.data![index]["address"].toString(),

                              ))
                          );
                        },

                        child: Container(
                          width: MediaQuery.of(context).size.width,
                          // color: Colors.grey ,
                          child: Card(
                            // color: Colors.grey,
                            shape: RoundedRectangleBorder(
                              borderRadius: BorderRadius.circular(5.0),
                            ),

                            child: Column(
                              children: [


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
                                                  snapshot.data![index]["name"].toString(),
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
                                                  snapshot.data![index]["contact"].toString(),
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
                                                  snapshot.data![index]["email"].toString(),
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
                                                  snapshot.data![index]["experience"].toString(),
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
