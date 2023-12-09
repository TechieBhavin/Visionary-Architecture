import 'package:untitled/UI/resource/UrlResourse.dart';
import 'package:untitled/ui/auth/LoginPage.dart';

import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;

class RegistrationPage extends StatefulWidget {
  const RegistrationPage({Key? key}) : super(key: key);

  @override
  State<RegistrationPage> createState() => _RegistrationPageState();
}

class _RegistrationPageState extends State<RegistrationPage> {
  TextEditingController _name = TextEditingController();
  TextEditingController _mno = TextEditingController();
  TextEditingController _email = TextEditingController();
  TextEditingController _pass = TextEditingController();

  var formkey = GlobalKey<FormState>();

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: SingleChildScrollView(
        child: Form(
          key: formkey,
          child: Column(children: [
            SizedBox(
              height: 50,
            ),
            Padding(padding: EdgeInsets.only(top: 50)),
            Image.asset("assets/images/logofinal.png"),
            Padding(padding: EdgeInsets.only(top: 10)),
            SizedBox(
              height: 50,
            ),
            Text(
              "REGISTRATION",
              style: TextStyle(
                fontWeight: FontWeight.bold,
                fontSize: 20,
                fontStyle: FontStyle.italic,
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
                    controller: _name,
                    decoration: InputDecoration(
                      border: OutlineInputBorder(),
                      labelText: 'Name',
                      hintText: 'Enter Your Name',

                    ),
                    validator: (val)
                    {
                      if(val!.length<=0)
                      {
                        return "Plese enter your name";
                      }
                      return null;
                    },


                  ),
                  SizedBox(
                    height: 20,
                  ),
                  TextFormField(
                    controller: _mno,
                    keyboardType: TextInputType.number,
                    decoration: InputDecoration(
                      border: OutlineInputBorder(),
                      labelText: 'Mobile No.',
                      hintText: 'Enter Your Mobile Number',
                    ),
                    validator: (val)
                    {
                      if(val!.length<=0)
                      {
                        return "Plese enter your mobile number";
                      }
                      return null;
                    },
                  ),
                  SizedBox(
                    height: 20,
                  ),
                  TextFormField(
                    controller: _email,
                    decoration: InputDecoration(
                      border: OutlineInputBorder(),
                      labelText: 'E-Mail',
                      hintText: 'Enter Your E-Mail',
                    ),
                    validator: (val)
                    {
                      if(val!.length<=0)
                      {
                        return "Plese enter your email";
                      }
                      return null;
                    },
                  ),
                  SizedBox(
                    height: 20,
                  ),
                  TextFormField(
                    controller: _pass,
                    obscureText: true,
                    decoration: InputDecoration(
                      border: OutlineInputBorder(),
                      labelText: 'Password',
                      hintText: 'Create Your Password',
                    ),
                    validator: (val)
                    {
                      if(val!.length<=0)
                      {
                        return "create your password";
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
                        {
                          if (formkey.currentState!.validate()) {
                        var name = _name.text.toString();
                        var phone = _mno.text.toString();
                        var email = _email.text.toString();
                        var password = _pass.text.toString();

                        Map<String, String> prams = {
                        "name": name,
                        "contact": phone,
                        "email": email,
                        "password": password,
                        };
                        Uri uri =
                        Uri.parse(UrlResourse.REGISTER);
                        var responce = await http.post(uri, body: prams);

                        if (responce.statusCode == 200) {
                        var body = responce.body.toString();
                        // print("result : "+body);
                        if (body == "yes") {
                        print("user regiser successfully");
                        Navigator.of(context).push(
                        MaterialPageRoute(builder: (context) => LoginPage())
                        );
                        } else {
                        print("user not regiser");
                        }
                        } else {
                        print("api error");
                        }


                        _name.text = "";
                        _mno.text = "";
                        _email.text = "";
                        _pass.text = "";


                          }
                        }
                      },

                      child: Container(

                        decoration: BoxDecoration(
                          color: Colors.black,
                          borderRadius: BorderRadius.all(Radius.circular(20)),
                        ),
                        padding: EdgeInsets.only(top: 20),
                        child: Text(

                          "REGISTER",
                          style: TextStyle(
                            color: Colors.white,
                            fontSize: 20,
                          ),
                          textAlign: TextAlign.center,
                        ),
                      ),
                    ),
                  ),
                  SizedBox(
                    height: 20,
                  ),

                  Row(
                    children: <Widget>[
                      Text('Already have an account?'),
                      TextButton(
                        child: Text(
                          "SIGN IN",
                          style: TextStyle(
                              color: Colors.black, fontWeight: FontWeight.bold),
                        ),
                        onPressed: () {
                          Navigator.of(context).pop();
                        },
                      ),
                    ],
                    mainAxisAlignment: MainAxisAlignment.center,
                  )
                ],
              ),
            ),
          ],),

        ),
      ),
    );
  }
}
