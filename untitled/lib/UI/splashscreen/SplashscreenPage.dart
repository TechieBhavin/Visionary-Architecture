import 'dart:async';

import 'package:untitled/ui/auth/LoginPage.dart';
import 'package:untitled/ui/comn/HomePage.dart';

import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';

class SplashscreenPage extends StatefulWidget {
  const SplashscreenPage({Key? key}) : super(key: key);

  @override
  State<SplashscreenPage> createState() => _SplashscreenPageState();
}

class _SplashscreenPageState extends State<SplashscreenPage> {
  checklogin()async{

    SharedPreferences prefs = await SharedPreferences.getInstance();
    if(prefs.containsKey("islogin"))
    {
      print("yes");
      Navigator.of(context).push(
          MaterialPageRoute(builder: (context)=>HomePage())
      );
    }
    else
    {
      print("no");
      Navigator.of(context).push(
        MaterialPageRoute(builder: (context)=>LoginPage())
      );
    }


  }
  @override
  void initState() {
    super.initState();
    Timer(Duration(seconds: 4),

            (){
          print("object111");
          checklogin();
        }
    );
  }

    @override
  Widget build(BuildContext context) {
      return Scaffold(
        body: Center(

            child: Image.asset("image/logofinal.png"),


        )
      );
    }
}
