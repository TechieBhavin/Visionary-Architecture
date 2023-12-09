import 'package:untitled/UI/architect/ViewArchitectPage.dart';

import 'package:flutter/material.dart';
import 'package:flutter_form_builder/flutter_form_builder.dart';
import 'package:http/http.dart' as http;

class InquiryPage extends StatefulWidget {
  const InquiryPage({Key? key}) : super(key: key);

  @override
  State<InquiryPage> createState() => _InquiryPageState();

}

class _InquiryPageState extends State<InquiryPage> {


  TextEditingController _name=TextEditingController();
  TextEditingController _mno = TextEditingController();
  TextEditingController _mail=TextEditingController();
  TextEditingController _subject=TextEditingController();
  TextEditingController _msg=TextEditingController();


  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("Inquiry Form"),
        backgroundColor: Colors.blue,
      ),
      body: SingleChildScrollView(
        child: Column(
          children: [
            SizedBox(height: 30,),
            Text(
              "Inquiry Form",
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
                    controller: _mail,
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
                    controller: _subject,
                    decoration: InputDecoration(
                      border: OutlineInputBorder(),
                      labelText: 'Subject',
                      hintText: 'Enter Your Subject',
                    ),
                  ),
                  SizedBox(
                    height: 20,
                  ),
                  TextField(
                    controller: _msg,
                    decoration: InputDecoration(
                      border: OutlineInputBorder(),
                      labelText: 'Message',
                      hintText: 'Enter Your Message',
                    ),
                  ),
                  SizedBox(height: 20,),

                  SizedBox(
                    width: 400,
                    height: 60,
                    child:GestureDetector(

                      onTap: () async {
                        {
                          Navigator.of(context).push(
                              MaterialPageRoute(builder: (context) => ViewArchitectPage())
                          );
                        }
                        var name = _name.text.toString();
                        var phone = _mno.text.toString();
                        var email = _mail.text.toString();
                        var subject = _subject.text.toString();
                        var message = _msg.text.toString();

                        Map<String, String> prams = {
                          "name": name,
                          "contact": phone,
                          "email": email,
                          "message": message,
                          "subject":subject,

                        };
                        Uri uri =
                        Uri.parse("http://192.168.43.105/api/inquiry.php");
                        var responce = await http.post(uri, body: prams);

                        if (responce.statusCode == 200) {
                          var body = responce.body.toString();
                          // print("result : "+body);
                          if (body == "yes") {
                            print("Inquiry succesfully given");
                          } else {
                            print("Inquiry not given");
                          }
                        } else {
                          print("api error");
                        }

                        _name.text = "";
                        _mno.text = "";
                        _mail.text = "";
                        _subject.text="";
                        _msg.text="";


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
