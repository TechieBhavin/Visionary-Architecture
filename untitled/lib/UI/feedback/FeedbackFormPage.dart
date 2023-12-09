import 'package:flutter/material.dart';
import 'package:flutter/material.dart';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:http/http.dart' as http;
import 'package:untitled/UI/comn/HomePage.dart';

import 'package:untitled/UI/resource/UrlResourse.dart';

class FeedbackFormPage extends StatefulWidget {
  const FeedbackFormPage({Key? key}) : super(key: key);

  @override
  State<FeedbackFormPage> createState() => _FeedbackFormPageState();
}

class _FeedbackFormPageState extends State<FeedbackFormPage> {
  TextEditingController _name=TextEditingController();
  TextEditingController _mno = TextEditingController();
  TextEditingController _email = TextEditingController();
  TextEditingController _message = TextEditingController();



  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("Feedback Form"),
        backgroundColor: Colors.blue,
      ),
      body: SingleChildScrollView(
        child: Column(
          children: [

            Align(
              alignment: Alignment.topLeft,

              child: Card(
                  child: Container(
                    alignment: Alignment.topLeft,
                    height:190,
                    width: MediaQuery.of(context).size.width,
                    decoration: BoxDecoration(
                      image: DecorationImage(
                        image: AssetImage("assets/images/feedback.jpeg",),
                        fit: BoxFit.cover,
                      ),
                    ),
                  )
                // backgroundImage: NetworkImage(urlimg+snapshot.data![index]["img_url"].toString(),),
              ),
            ),
            Padding(
              padding: EdgeInsets.all(15),
              child: Column(
                children: [
                  SizedBox(
                    height: 20,
                  ),
                  TextField(
                    controller: _name,
                    decoration: InputDecoration(
                      border: OutlineInputBorder(),
                      labelText: 'Name',
                      hintText: 'Enter Your Name',
                    ),
                  ),
                  SizedBox(
                    height: 20,
                  ),
                  TextField(
                    controller: _mno,
                    keyboardType: TextInputType.number,
                    decoration: InputDecoration(
                      border: OutlineInputBorder(),
                      labelText: 'Mobile No.',
                      hintText: 'Enter Your Mobile Number',
                    ),
                  ),
                  SizedBox(
                    height: 20,
                  ),
                  TextField(
                    controller: _email,
                    decoration: InputDecoration(
                      border: OutlineInputBorder(),
                      labelText: 'E-Mail',
                      hintText: 'Enter Your E-Mail',
                    ),
                  ),
                  SizedBox(
                    height: 20,
                  ),
                  TextField(
                    controller: _message,
                    decoration: InputDecoration(
                      border: OutlineInputBorder(),
                      labelText: 'Message',
                      hintText: 'Enter Your Message',
                    ),
                  ),
                  SizedBox(
                    height: 20,
                  ),



                  SizedBox(
                    width: 400,
                    height: 60,
                    child:GestureDetector(
                      onTap: () async {
                        {
                          Navigator.of(context).push(
                              MaterialPageRoute(builder: (context) => HomePage())
                          );
                        }
                        var name = _name.text.toString();
                        var phone = _mno.text.toString();
                        var email = _email.text.toString();
                        var message = _message.text.toString();

                        Map<String, String> prams = {
                          "name": name,
                          "contact": phone,
                          "email": email,
                          "message": message,
                        };
                        Uri uri =
                        Uri.parse(UrlResourse.FADDBACK);
                        var responce = await http.post(uri, body: prams);

                        if (responce.statusCode == 200) {
                          var body = responce.body.toString();
                          // print("result : "+body);
                          if (body == "yes") {
                            // print("Feedback succesfully give");
                            // Navigator.of(context).push(
                            //     MaterialPageRoute(builder: (context) => feedbacksuccessfullpage())
                            // );
                            Fluttertoast.showToast(
                                msg: "Thank you for your feedback",
                                toastLength: Toast.LENGTH_SHORT,
                                gravity: ToastGravity.CENTER,
                                timeInSecForIosWeb: 1,
                                backgroundColor: Colors.grey,
                                textColor: Colors.black,
                                fontSize: 16.0
                            );
                          } else {
                            Fluttertoast.showToast(
                                msg: "Your Feedback is not given",
                                toastLength: Toast.LENGTH_SHORT,
                                gravity: ToastGravity.CENTER,
                                timeInSecForIosWeb: 1,
                                backgroundColor: Colors.grey,
                                textColor: Colors.black,
                                fontSize: 16.0
                            );
                          }
                        } else {
                          Fluttertoast.showToast(
                              msg: "API error",
                              toastLength: Toast.LENGTH_SHORT,
                              gravity: ToastGravity.CENTER,
                              timeInSecForIosWeb: 1,
                              backgroundColor: Colors.grey,
                              textColor: Colors.black,
                              fontSize: 16.0
                          );
                        }

                        _name.text = "";
                        _mno.text = "";
                        _email.text = "";
                        _message.text="";


                      },
                      child: Container(
                        decoration: BoxDecoration(
                          color: Colors.black,
                          borderRadius: BorderRadius.all(Radius.circular(20)),
                        ),
                        padding: EdgeInsets.only(top: 20),
                        child: Text("SUBMIT",style: TextStyle(color: Colors.white,fontSize: 20,),
                          textAlign: TextAlign.center,),
                      ),
                    ) ,
                  ),




                ],
              ),
            ),

          ],
        ),
      ),
    );
  }
}
