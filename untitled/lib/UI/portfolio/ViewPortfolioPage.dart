import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

import 'package:untitled/UI/resource/UrlResourse.dart';

class ViewPortfolioPage extends StatefulWidget {
  const ViewPortfolioPage({Key? key}) : super(key: key);

  @override
  State<ViewPortfolioPage> createState() => _ViewPortfolioPageState();
}

class _ViewPortfolioPageState extends State<ViewPortfolioPage> {

  var aid="";
  late Future<List?> alldata;
  // var urlimg = "http://192.168.43.105/architecture/admin/uploads/architect/";
  Future<List?> getportfoliodata()async{
    Uri uri = Uri.parse(UrlResourse.GETPORTFOLIO);
    var responce = await http.get(uri);



    if(responce.statusCode==200)
    {
      var body = responce.body.toString();
      var json = jsonDecode(body);

      return json["data"];
    }
    else
    {
      print("API error");
    }

  }

  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    setState(() {
      alldata = getportfoliodata();
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(title: Text("Portfolios",), backgroundColor: Colors.blue,),

        body:FutureBuilder(
          future: alldata,

          builder: (context,snapshot)
          {
            // print("object1");
            print("object : "+alldata.toString());
            if(snapshot.hasData)
            {

              if(snapshot.data!.length<=0)
              {
                return Center(child: Text("No portfolios"),);
              }
              else
              {

                return ListView.builder(
                    itemCount: snapshot.data!.length,
                    itemBuilder:  (context,index)
                    {
                      return GestureDetector(
                        // onTap: (){
                        //   Navigator.of(context).push(
                        //       MaterialPageRoute(builder: (context)=>ViewPortfolioDetails(
                        //         id: snapshot.data![index]["portfolio_id"].toString(),
                        //         ptitle: snapshot.data![index]["title"].toString(),
                        //         about_us:snapshot.data![index]["about_us"].toString(),
                        //         name:snapshot.data![index]["name"].toString(),
                        //         start_date:snapshot.data![index]["start_date"].toString(),
                        //         end_date:snapshot.data![index]["end_date"].toString(),
                        //         video_url:snapshot.data![index]["video_url"].toString(),
                        //
                        //
                        //
                        //       ))
                        //   );
                        // },

                        child: Container(
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
                                          // backgroundImage: NetworkImage(urlimg+snapshot.data![index]["cover_image"].toString(),),
                                          backgroundImage: AssetImage("image/portfolio.png"),
                                        ),

                                        // child: CircleAvatar(
                                        //     child: Image.network(urlimg+snapshot.data![index]["profile_photo"].toString(),height: 20,width: 40,)
                                        // ),
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
