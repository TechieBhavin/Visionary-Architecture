import 'package:untitled/UI/cart/ViewCartPage.dart';
import 'package:untitled/UI/resource/UrlResourse.dart';
import 'package:untitled/ui/shop/ViewProductDetails.dart';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

class ViewproductPage extends StatefulWidget {
  const ViewproductPage({Key? key}) : super(key: key);

  @override
  State<ViewproductPage> createState() => _ViewproductPageState();
}

class _ViewproductPageState extends State<ViewproductPage> {
  late Future<List?> alldata;
  var urlimg = "http://192.168.43.45/architecture/seller/uploads/product/";

  Future<List?> getproductdata() async {
    Uri uri = Uri.parse(UrlResourse.PRODUCT);
    var responce = await http.get(uri);

    if (responce.statusCode == 200) {
      var body = responce.body.toString();
      var json = jsonDecode(body);
      return json;
    } else {
      print("API error");
    }
  }

  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    setState(() {
      alldata = getproductdata();
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("products"),
        backgroundColor: Colors.blueGrey,
        actions: <Widget>[
          IconButton(
            icon: Icon(Icons.shopping_cart),
            onPressed: () {
              Navigator.of(context).push(
                  MaterialPageRoute(builder: (context) => ViewCartPage()));
            },
          )
        ],
      ),



        body:FutureBuilder(

          future: alldata,

          builder: (context,snapshot)
          {

            print("object : "+alldata.toString());
            if(snapshot.hasData)
            {

              if(snapshot.data!.length<=0)
              {
                return Center(child: Text("No Products"),);
              }
              else
              {

                return GridView.builder(
                    gridDelegate: SliverGridDelegateWithFixedCrossAxisCount(
                        crossAxisCount: 2,
                        mainAxisSpacing: 10,
                        crossAxisSpacing: 5,
                    ),
                    itemCount: snapshot.data!.length,
                    itemBuilder:  (context,index)
                    {
                      return GestureDetector(
                        onTap: (){
                          Navigator.of(context).push(
                              MaterialPageRoute(builder: (context)=>ViewProductDetails(id: snapshot.data![index]["pid"].toString(),
                                pname:snapshot.data![index]["title"].toString(),
                                price:snapshot.data![index]["price"].toString(),
                                brandname:snapshot.data![index]["bname"].toString(),
                                sname:snapshot.data![index]["name"].toString(),
                                scat:snapshot.data![index]["subcat_name"].toString(),
                                des:snapshot.data![index]["description"].toString(),
                                video_url:snapshot.data![index]["video_url"].toString(),
                                product_type:snapshot.data![index]["product_type"].toString(),
                              ))
                          );
                        },



                        child: Container(
                          width: MediaQuery.of(context).size.width,
                          // color: Colors.grey ,
                          child: Card(
                            // color: Colors.grey,

                            child: Column(
                              children: [

                                Container(
                                  width: MediaQuery.of(context).size.width,
                                  height: 180,

                                  child: Column(

                                    children:<Widget> [


                                      Align(
                                        alignment: Alignment.topLeft,

                                        child: Card(
                                            child: Container(
                                              alignment: Alignment.topLeft,
                                              height:100,
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


                                      Padding(
                                        padding: const EdgeInsets.all(8.0),
                                        child: Row(
                                          children: [
                                            Text(snapshot.data![index]["title"].toString(),style: TextStyle(
                                              fontSize: 20,
                                              fontWeight: FontWeight.bold,
                                            ),)
                                          ],
                                        ),
                                      ),
                                      Padding(
                                        padding: const EdgeInsets.all(8.0),
                                        child: Row(
                                          children: [
                                            Text("Price :-",style: TextStyle(
                                              fontSize: 20,
                                              // fontWeight: FontWeight.bold,
                                            ),),
                                            SizedBox(
                                              width: 10,
                                            ),

                                            Text(snapshot.data![index]["price"].toString(),style: TextStyle(
                                              fontSize: 20,
                                              // fontWeight: FontWeight.bold,
                                            ),)
                                          ],
                                        ),
                                      ),

                                    ],
                                  ),

                                )

                              ],
                            ),

                          ),
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



// snapshot.data![index]["title"]
// .toString(),
