import 'package:untitled/ui/auth/UpdateProfile.dart';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

import 'package:shared_preferences/shared_preferences.dart';

class ProfilePage extends StatefulWidget {
  const ProfilePage({Key? key}) : super(key: key);

  @override
  State<ProfilePage> createState() => _ProfilePageState();
}

class _ProfilePageState extends State<ProfilePage> {

  late Future<List?> alldata;

  Future<List?> getuserdata()async{

    SharedPreferences prefs = await SharedPreferences.getInstance();
     var userid = prefs.getString("userid").toString();

     Map<String,dynamic> prafm = {
       "userid":userid,
     };

    Uri uri = Uri.parse("http://192.168.43.105/api/getuser.php");
    var responce = await http.post(uri,body: prafm);

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
      alldata = getuserdata();
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("My Profile"),
        backgroundColor: Colors.blueGrey,
      ),
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
                return Center(child: Text("User Not Registered"),);
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
                              MaterialPageRoute(builder: (context)=>UpdateProfile(
                                // id: snapshot.data![index]["user_id"].toString(),
                                // name:snapshot.data![index]["name"].toString(),
                                // contact:snapshot.data![index]["contact"].toString(),
                                // email:snapshot.data![index]["email"].toString(),
                              ))
                          );
                        },

                        child: Column(
                          children: [
                            SizedBox(
                              height: 50,
                            ),
                            Padding(padding: EdgeInsets.only(top: 50)),
                            Image.asset('image/logofinal.png'),
                            Padding(padding: EdgeInsets.only(top: 10)),
                            SizedBox(height: 30,),
                            Align(
                              alignment: Alignment.center,
                              child: Column(
                                children: [
                                  CircleAvatar(
                                      radius: 60,
                                      backgroundImage: AssetImage("image/profile.png",)
                                  ),
                                  SizedBox(height: 20,),
                                  Container(
                                    width: MediaQuery.of(context).size.width,
                                    margin: EdgeInsets.only(left: 20,right: 20),
                                    alignment: Alignment.topRight,
                                    decoration: BoxDecoration(
                                      borderRadius: BorderRadius.circular(10),
                                      color: Colors.white24,
                                      border: Border.all(
                                        color: Colors.grey,
                                        width: 2,
                                      ),
                                    ),
                                    child: Column(
                                      children: [
                                        Padding(
                                          padding: const EdgeInsets.all(8.0),
                                          child: Row(
                                            children: [
                                              Text(
                                                "Name :-",
                                                style: TextStyle(
                                                  fontSize: 15,
                                                  fontWeight: FontWeight.bold,
                                                ),
                                              ),
                                              SizedBox(
                                                width: 10,
                                              ),
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
                                          padding: const EdgeInsets.all(8.0),
                                          child: Row(
                                            children: [
                                              Text(
                                                "Mobile No. :-",
                                                style: TextStyle(
                                                  fontSize: 15,
                                                  fontWeight: FontWeight.bold,
                                                ),
                                              ),
                                              SizedBox(
                                                width: 10,
                                              ),
                                              Text(
                                                snapshot.data![index]["contact"].toString(),
                                                style: TextStyle(
                                                  fontSize: 15,
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
                                                "E-Mail :-",
                                                style: TextStyle(
                                                  fontSize: 15,
                                                  fontWeight: FontWeight.bold,
                                                ),
                                              ),
                                              SizedBox(
                                                width: 10,
                                              ),
                                              Text(
                                                snapshot.data![index]["email"].toString(),
                                                style: TextStyle(
                                                  fontSize: 15,
                                                  fontWeight: FontWeight.bold,
                                                ),
                                              )
                                            ],
                                          ),
                                        ),
                                      ],

                                    ),

                                  ),

                                  SizedBox(height: 20,),

                                  SizedBox(
                                    width: 150,
                                    height: 60,
                                    child: GestureDetector(
                                      onTap: () {
                                        Navigator.of(context).push(MaterialPageRoute(
                                            builder: (context) => UpdateProfile()));
                                      },
                                      child: Container(
                                        decoration: BoxDecoration(
                                          color: Colors.black,
                                          borderRadius: BorderRadius.all(Radius.circular(10)),
                                        ),
                                        padding: EdgeInsets.only(top: 20),
                                        child: Text(
                                          "Update Your Profile",
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
