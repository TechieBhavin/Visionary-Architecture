import 'dart:convert';

import 'package:untitled/ui/auth/LoginPage.dart';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;

class ForgotPassword extends StatefulWidget {


  ForgotPassword({Key? key}) : super(key: key);

  @override
  State<ForgotPassword> createState() => _ForgotPasswordState();
}

class _ForgotPasswordState extends State<ForgotPassword> {

  TextEditingController email=TextEditingController();


  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("Forgot Password"),
        backgroundColor: Colors.blueGrey,
      ),
      body: SingleChildScrollView(
        child: Form(
          child: Column(

            children: [
              SizedBox(
                height: 40,
              ),
              Text(
                "Forgot Your Password",
                style: TextStyle(
                  fontWeight: FontWeight.bold,
                  fontSize: 20,
                  // fontStyle: FontStyle.italic,
                ),
              ),
              Padding(
                padding: EdgeInsets.all(15),
                child: Column(
                  children: [
                    SizedBox(
                      height: 20,
                    ),
                    TextFormField(
                      controller: email,
                      decoration: InputDecoration(
                        border: OutlineInputBorder(),
                        labelText: 'E-mail',
                        hintText: 'Enter Your E-mail',
                      ),
                      validator: (val) {
                        if (val!.length <= 0) {
                          return "required";
                        }
                        return null;
                      },
                    ),
                    SizedBox(
                      height: 20,
                    ),

                    SizedBox(
                      width: 400,
                      height: 60,
                      child: GestureDetector(
                         onTap: () async {
                          var mail = email.text.toString();
                           Map<String,String> prams ={
                            "mail":mail

                           };
                           Uri uri =
                           Uri.parse("http://192.168.43.105/api/changepassword.php");
                           var responce = await http.post(uri, body: prams);
                           if(responce.statusCode==200)
                             {
                               var body = responce.body.toString();
                               var json = jsonDecode(body);
                               if(json["status"]=="true")
                                 {
                                   var msg = json["message"].toString();
                                   print(msg);
                                   Navigator.of(context).push(
                                     MaterialPageRoute(builder: (context)=>LoginPage())
                                   );
                                 }
                               else
                                 {
                                   var msg = json["message"].toString();
                                   print(msg);
                                 }
                             }
                         },
                        child: Container(
                            decoration: BoxDecoration(
                              color: Colors.black,
                              borderRadius:
                              BorderRadius.all(Radius.circular(20)),
                            ),
                            padding: EdgeInsets.only(top: 20),
                            child: Text(
                              "CONTINUE",
                              style: TextStyle(
                                color: Colors.white,
                                fontSize: 20,
                              ),
                              textAlign: TextAlign.center,
                            )),
                      ),
                    ),
                  ],
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
