import 'dart:convert';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:http/http.dart' as http;
import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:untitled/UI/resource/UrlResourse.dart';

class ViewProductDetails extends StatefulWidget {
  var id;
  var pname;
  var price;
  var brandname;
  var sname;
  var scat;
  var des;
  var video_url;
  var product_type;

  ViewProductDetails({
    Key? key,
    this.id,
    this.pname,
    this.price,
    this.brandname,
    this.sname,
    this.scat,
    this.des,
    this.video_url,
    this.product_type,
  }) : super(key: key);

  @override
  State<ViewProductDetails> createState() => _ViewProductDetailsState();
}

class _ViewProductDetailsState extends State<ViewProductDetails> {
  var qty = "1";

  // var total="";
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("Product Details"),
        backgroundColor: Colors.blueGrey,
      ),
      body: SingleChildScrollView(
        child: Column(
          children: <Widget>[
            SizedBox(
              height: 10,
              width: 10,
            ),
            Align(
              alignment: Alignment.topLeft,
              // child: Image.network(urlimg+snapshot.data![index]["cat_icon"].toString(),height: 20,width: 40,)

              child: Card(
                  child: Container(
                alignment: Alignment.topLeft,
                height: 150,
                width: MediaQuery.of(context).size.width,
                decoration: BoxDecoration(
                  image: DecorationImage(
                    image: AssetImage("assets/images/product.png",),
                    fit: BoxFit.cover,
                  ),
                ),
              )
                  // backgroundImage: NetworkImage(urlimg+snapshot.data![index]["img_url"].toString(),),
                  ),
            ),
            SizedBox(
              height: 20,
            ),
            Padding(
              padding: const EdgeInsets.all(8.0),
              child: Row(
                children: [
                  Text(
                    widget.pname.toString(),
                    style: TextStyle(
                      fontSize: 20,
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
                    "seller name :-",
                    style: TextStyle(
                      fontSize: 20,
                      // fontWeight: FontWeight.bold,
                    ),
                  ),
                  SizedBox(
                    width: 10,
                  ),
                  Text(
                    widget.sname,
                    style: TextStyle(
                      fontSize: 20,
                      // fontWeight: FontWeight.bold,
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
                    "sub category name :-",
                    style: TextStyle(
                      fontSize: 20,
                      // fontWeight: FontWeight.bold,
                    ),
                  ),
                  SizedBox(
                    width: 10,
                  ),
                  Text(
                    widget.scat,
                    style: TextStyle(
                      fontSize: 20,
                      // fontWeight: FontWeight.bold,
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
                    "brand name :-",
                    style: TextStyle(
                      fontSize: 20,
                      // fontWeight: FontWeight.bold,
                    ),
                  ),
                  SizedBox(
                    width: 10,
                  ),
                  Text(
                    widget.brandname,
                    style: TextStyle(
                      fontSize: 20,
                      // fontWeight: FontWeight.bold,
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
                    "price :-",
                    style: TextStyle(
                      fontSize: 20,
                      // fontWeight: FontWeight.bold,
                    ),
                  ),
                  SizedBox(
                    width: 10,
                  ),
                  Text(
                    widget.price,
                    style: TextStyle(
                      fontSize: 20,
                      // fontWeight: FontWeight.bold,
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
                    "description :-",
                    style: TextStyle(
                      fontSize: 20,
                      // fontWeight: FontWeight.bold,
                    ),
                  ),
                  SizedBox(
                    width: 10,
                  ),
                  Text(
                    widget.des,
                    style: TextStyle(
                      fontSize: 20,
                      // fontWeight: FontWeight.bold,
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
                    "video URL :-",
                    style: TextStyle(
                      fontSize: 20,
                      // fontWeight: FontWeight.bold,
                    ),
                  ),
                  SizedBox(
                    width: 10,
                  ),
                  Text(
                    widget.video_url,
                    style: TextStyle(
                      fontSize: 20,
                      // fontWeight: FontWeight.bold,
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
                    "product typer :-",
                    style: TextStyle(
                      fontSize: 20,
                      // fontWeight: FontWeight.bold,
                    ),
                  ),
                  SizedBox(
                    width: 10,
                  ),
                  Text(
                    widget.product_type,
                    style: TextStyle(
                      fontSize: 20,
                      // fontWeight: FontWeight.bold,
                    ),
                  )
                ],
              ),
            ),
            SizedBox(height: 20,),

            DecoratedBox(
              decoration: BoxDecoration(
                  color: Colors.blueGrey,
                  //background color of dropdown button
                  border: Border.all(color: Colors.black38, width: 3),
                  //border of dropdown button
                  borderRadius: BorderRadius.circular(50),
                  //border raiuds of dropdown button
                  boxShadow: <BoxShadow>[
                    //apply shadow on Dropdown button
                    BoxShadow(
                        color: Color.fromRGBO(0, 0, 0, 0.57),
                        //shadow for button
                        blurRadius: 5) //blur radius of shadow
                  ]),
              child: Padding(
                padding: EdgeInsets.only(left: 30, right: 20),
                child: DropdownButton(
                  onChanged: (val) {
                    setState(() {
                      qty = val!;
                    });
                  },
                  value: qty,
                  items: [
                    DropdownMenuItem(
                      child: Text("Quantity : 1"),
                      value: "1",
                    ),
                    DropdownMenuItem(
                      child: Text("Quantity : 2"),
                      value: "2",
                    ),
                    DropdownMenuItem(
                      child: Text("Quantity : 3"),
                      value: "3",
                    )
                  ],
                ),
              ),
            ),

            SizedBox(
              height: 20,
            ),
            SizedBox(
              width: 100,
              height: 60,
              child: GestureDetector(
                onTap: ()async{
                  SharedPreferences prefs = await SharedPreferences.getInstance();
                  var userid = prefs.getString("userid").toString();
                  var qtnty = qty.toString();

                  var total = int.parse(widget.price.toString()) * int.parse(qtnty.toString());
                  print(total);

                  Map<String,String> prams ={
                    "user_id":userid,
                    "pid":widget.id,
                    "quantity":qtnty,
                    "total":total.toString()

                  };
                  Uri uri =
                  Uri.parse(UrlResourse.ADD_CART);
                  var responce = await http.post(uri, body: prams);
                  if(responce.statusCode==200)
                  {
                    var body = responce.body.toString();
                    var json = jsonDecode(body);

                    if(json["status"]=="true")
                    {
                      var msg = json["message"].toString();
                      Fluttertoast.showToast(
                          msg: "product added",
                          toastLength: Toast.LENGTH_SHORT,
                          gravity: ToastGravity.CENTER,
                          timeInSecForIosWeb: 1,
                          backgroundColor: Colors.grey,
                          textColor: Colors.black,
                          fontSize: 16.0
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
                    borderRadius: BorderRadius.all(Radius.circular(10)),
                  ),
                  padding: EdgeInsets.only(top: 20),
                  child: Text(
                    "Add To Cart",
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
      ),
    );
  }
}
