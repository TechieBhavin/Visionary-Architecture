import 'dart:convert';

import 'package:untitled/UI/resource/UrlResourse.dart';
import 'package:untitled/ui/auth/ForgotPassword.dart';
import 'package:untitled/ui/auth/RegistrationPage.dart';
import 'package:untitled/ui/comn/HomePage.dart';
import 'package:flutter/material.dart';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';


class LoginPage extends StatefulWidget {
  const LoginPage({Key? key}) : super(key: key);

  @override
  State<LoginPage> createState() => _LoginPageState();
}

class _LoginPageState extends State<LoginPage> {

  TextEditingController _email = TextEditingController();
  TextEditingController _pass = TextEditingController();



var formkey = GlobalKey<FormState>();
  @override
  Widget build(BuildContext context) {


    return Scaffold(
          body: SingleChildScrollView(

            child: Form(
              key: formkey,
              child: Column(

                children: [
                  SizedBox(height: 100,),
                  Padding(padding: EdgeInsets.only(top: 20)),
                  Image.asset("assets/images/logofinal.png"),
                  SizedBox(height: 50,),

                  Text("LOGIN TO YOUR PAGE",
                  style: TextStyle(fontWeight: FontWeight.bold,fontSize: 20,fontStyle: FontStyle.italic,),),
                  Padding(padding: EdgeInsets.all(15),

                    child: Column(
                      children: [
                        SizedBox(height: 20,),
                        TextFormField(
                        controller: _email,
                          decoration: InputDecoration(
                            border: OutlineInputBorder(),
                            labelText: 'User Name',
                            hintText: 'Enter Your User Name',
                          ),
                          validator: (val)
                          {
                            if(val!.length<=0)
                              {
                                return "Plese enter email";
                              }
                            return null;
                          },
                        ),
                        SizedBox(height: 20,),
                        TextFormField(
                          controller: _pass,
                           obscureText: true,
                          decoration: InputDecoration(
                            border: OutlineInputBorder(),
                            labelText: 'Password',
                            hintText: 'Enter Your Password',

                          ),
                          validator: (val)
                          {
                            if(val!.length<=0)
                            {
                              return "Plese enter password";
                            }
                            return null;
                          },
                        ),
                        SizedBox(height: 20,),
                        TextButton(
                          child:Align(
                            alignment: Alignment.centerRight,
                            child:  Text(
                              "FORGOT PASSWORD?",

                              style: TextStyle(
                                  color: Colors.black,
                                  fontWeight: FontWeight.bold
                              ),
                            ),
                          ),
                          onPressed: () {
                            Navigator.of(context).push(
                              MaterialPageRoute(builder: (context) => ForgotPassword())
                            );
                          },
                        ),
                        SizedBox(height: 20,),

                        SizedBox(
                          width: 400,
                          height: 60,
                          child:GestureDetector(
                            onTap: () async {
                              if(formkey.currentState!.validate())
                                {
                                  var email = _email.text.toString();
                                  var password = _pass.text.toString();
                                  print(email);
                                  print(password);

                                  Map<String, String> prams = {

                                    "email": email,
                                    "password": password,
                                  };
                                  Uri uri =
                                  Uri.parse(UrlResourse.LOGIN);
                                  var responce = await http.post(uri, body: prams);
                                  print(responce);
                                  if (responce.statusCode == 200) {
                                    var body = responce.body.toString();
                                    print("result : "+body);
                                    var json = jsonDecode(body);
                                    {
                                      if(json["status"]=="true")
                                      {
                                        var msg = json["message"].toString();
                                        print(msg);

                                        var userid = json["data"]["user_id"].toString();
                                        var username = json["data"]["name"].toString();
                                        var usercontact = json["data"]["contact"].toString();
                                        var useremail = json["data"]["email"].toString();
                                        print(userid);

                                        SharedPreferences prefs = await SharedPreferences.getInstance();
                                        prefs.setString("islogin", "yes");
                                        prefs.setString("userid", userid);
                                        prefs.setString("username", username);
                                        prefs.setString("usercontact", usercontact);
                                        prefs.setString("useremail", useremail);

                                        Fluttertoast.showToast(
                                            msg: msg,
                                            toastLength: Toast.LENGTH_SHORT,
                                            gravity: ToastGravity.CENTER,
                                            timeInSecForIosWeb: 1,
                                            backgroundColor: Colors.grey,
                                            textColor: Colors.black,
                                            fontSize: 16.0
                                        );
                                        Navigator.of(context).push(
                                          MaterialPageRoute(builder: (context) => HomePage()),

                                        );
                                      }
                                      else
                                      {
                                        var msg = json["message"].toString();
                                        print(msg);
                                        Fluttertoast.showToast(
                                            msg: "username & password invalid or u are not verify ",
                                            toastLength: Toast.LENGTH_SHORT,
                                            gravity: ToastGravity.CENTER,
                                            timeInSecForIosWeb: 1,
                                            backgroundColor: Colors.red,
                                            textColor: Colors.white,
                                            fontSize: 16.0
                                        );
                                      }
                                    }

                                  } else {
                                    print("api error");
                                  }
                                  _email.text = "";
                                  _pass.text = "";
                                }
                            },

                            child: Container(

                              decoration: BoxDecoration(
                                color: Colors.black,
                                borderRadius: BorderRadius.all(Radius.circular(20)),
                              ),
                              padding: EdgeInsets.only(top: 20),
                              child: Text("LOGIN",style: TextStyle(color: Colors.white,fontSize: 20,),
                                textAlign: TextAlign.center,),
                            ),
                          ) ,
                        ),
                        SizedBox(height: 20,),

                        Row(
                          children: <Widget>[
                            const Text('Does not have account?'),
                            TextButton(

                              child: Text(
                                "SIGN UP",
                                style: TextStyle(
                                  color: Colors.black,
                                    fontWeight: FontWeight.bold
                                ),
                              ),
                              onPressed: () {
                                Navigator.of(context).push(
                                    MaterialPageRoute(builder: (context) => RegistrationPage())
                                );
                              },
                            ),

                          ],
                          mainAxisAlignment: MainAxisAlignment.center,
                        )
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
