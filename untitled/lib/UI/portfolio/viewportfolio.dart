import 'dart:convert';

import 'package:flutter/material.dart';

import 'package:http/http.dart' as http;
import 'package:untitled/UI/resource/UrlResourse.dart';

class viewportfolio extends StatefulWidget {
  var id;
   viewportfolio({Key? key,this.id}) : super(key: key);

  @override
  State<viewportfolio> createState() => _viewportfolioState();
}

class _viewportfolioState extends State<viewportfolio> {

  late Future<List?> alldata;

  var urlimg = UrlResourse.categoryimgurl;
  Future<List?> getportfoliodata()async{
print("test");
    Uri uri = Uri.parse(UrlResourse.GETPORTFOLIO);
    var responce = await http.post(uri,body: {"id":widget.id});
print("responce = ${responce.statusCode}");

    if(responce.statusCode==200)
    {
      var body = responce.body.toString();
      print("body = ${body}");
      var json = jsonDecode(body);
      return json;
      // print("json = ${json}");
    }
    else
    {
      print("api error");
    }

  }

  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    print("demo");
    setState(() {
      alldata = getportfoliodata();
      print("demo");
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(title: Text("Portfolio's"),),
        body:FutureBuilder(
          future: alldata,
          builder: (context,snapshot)
          {
            if(snapshot.hasData)
            {
              if(snapshot.data!.length<=0)
              {
                return Center(child: Text("No portfolio"),);
              }
              else
              {
                return ListView.builder(
                    itemCount: snapshot.data!.length,
                    itemBuilder:  (context,index)
                    {
                      return Container(
                        width: MediaQuery.of(context).size.width,
                        // color: Colors.grey ,
                        child: Card(
                          // color: Colors.grey,

                          shape: RoundedRectangleBorder(

                            borderRadius: BorderRadius.circular(5.0),
                          ),

                          child: Column(
                            children: [
                              // Text(snapshot.data![index]["cat_name"].toString()),
                              // Text(snapshot.data![index]["cat_icon"].toString()),
                              Container(
                                width: MediaQuery.of(context).size.width,
                                height: 70,

                                child: Row(

                                  children:<Widget> [

                                    SizedBox(height: 10,width: 10,),
                                    Align(
                                      alignment: Alignment.center,
                                      // child: Image.network(urlimg+snapshot.data![index]["cat_icon"].toString(),height: 20,width: 40,)

                                      child: CircleAvatar(
                                        backgroundImage: NetworkImage(urlimg+snapshot.data![index]["cover_image"].toString(),),
                                      ),
                                    ),
                                    SizedBox(height: 10,width: 10,),
                                    Align(

                                      alignment: Alignment.center,
                                      child: Text(snapshot.data![index]["title"].toString(),
                                        style: TextStyle(fontSize: 20,),),
                                    ),




                                  ],
                                ),

                              )

                            ],
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
