import 'dart:convert';

import 'package:untitled/ui/auth/LoginPage.dart';
import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;



class ChangePasswordPage extends StatefulWidget {
  const ChangePasswordPage({Key? key}) : super(key: key);

  @override
  State<ChangePasswordPage> createState() => _ChangePasswordPageState();
}

class _ChangePasswordPageState extends State<ChangePasswordPage> {
  TextEditingController _oldpassword = TextEditingController();
  TextEditingController _newpassword = TextEditingController();
  TextEditingController _confirmpassword = TextEditingController();

  var formkey = GlobalKey<FormState>();

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("Change Password"),
        backgroundColor: Colors.blueGrey,
      ),
      body: SingleChildScrollView(
        child: Form(
          key: formkey,
          child: Column(

            children: [
              SizedBox(
                height: 40,
              ),
              Text(
                "Reset Your Password",
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
                      controller: _oldpassword,
                      decoration: InputDecoration(
                        border: OutlineInputBorder(),
                        labelText: 'Old Password',
                        hintText: 'Enter Your Old Password',
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
                    TextFormField(
                      controller: _newpassword,
                      keyboardType: TextInputType.number,
                      decoration: InputDecoration(
                        border: OutlineInputBorder(),
                        labelText: 'New Password',
                        hintText: 'Create Your New Password',
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
                    TextFormField(
                      controller: _confirmpassword,
                      decoration: InputDecoration(
                        border: OutlineInputBorder(),
                        labelText: 'Confirm Password',
                        hintText: 'Repeat Your New Password',
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
                          if (formkey.currentState!.validate()) {

                            SharedPreferences prefs = await SharedPreferences.getInstance();
                            var userid = prefs.getString("userid").toString();
                            var old = _oldpassword.text.toString();
                            var newpass = _newpassword.text.toString();
                            // var confirm = _confirmpassword.text.toString();


                            Map<String,String> prams ={
                              "oldpw":old,
                              "newpw":newpass,
                              "userid":userid

                            };
                            Uri uri =
                            Uri.parse("http://192.168.43.105/api/changepassword.php");
                            var responce = await http.post(uri, body: prams);
                            if(responce.statusCode==200)
                            {
                              var body = responce.body.toString();
                              if(body=="yes")
                              {
                                print("password change");
                                Navigator.of(context).push(
                                    MaterialPageRoute(builder: (context)=>LoginPage())
                                );
                              }
                              else
                              {
                                print("password not change");
                              }
                              // var json = jsonDecode(body);
                              // if(json["yes"]=="true")
                              // {
                              //   var msg = json["message"].toString();
                              //   print(msg);
                              //   Navigator.of(context).push(
                              //       MaterialPageRoute(builder: (context)=>LoginPage())
                              //   );
                              // }
                              // else
                              // {
                              //   var msg = json["message"].toString();
                              //   print(msg);
                              // }
                            }

                          } else {
                            print("API error");
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


