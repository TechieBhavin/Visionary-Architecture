import 'package:flutter/material.dart';
import 'dart:convert';
import 'package:http/http.dart' as http;

class ArchitectProfilePage extends StatefulWidget {
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

  ArchitectProfilePage({Key? key,
    this.id,
    this.name,
    this.contact,
    this.specialization,
    this.web,
    this.exp,
    this.add,
    this.about,
    this.email,
    this.profile

  }) : super(key: key);

  @override
  State<ArchitectProfilePage> createState() => _ArchitectProfilePageState();
}

class _ArchitectProfilePageState extends State<ArchitectProfilePage> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("Architect Profile"),
      ),
      body: SingleChildScrollView(

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


            ],
          ),
        ),
      ),
    );
  }
}
