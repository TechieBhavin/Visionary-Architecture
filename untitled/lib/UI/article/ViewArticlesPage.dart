import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';
import 'package:untitled/UI/article/ViewArticleDetailsPage.dart';
import 'package:untitled/UI/resource/UrlResourse.dart';

class ViewArticlesPage extends StatefulWidget {
  const ViewArticlesPage({Key? key}) : super(key: key);

  @override
  State<ViewArticlesPage> createState() => _ViewArticlesPageState();
}

class _ViewArticlesPageState extends State<ViewArticlesPage> {

  late Future<List?> alldata;

  Future<List?> getarticledata()async{

    Uri uri = Uri.parse(UrlResourse.GET_ARTICLE);
    var responce = await http.get(uri);

    if(responce.statusCode==200)
    {
      var body = responce.body.toString();
      var json = jsonDecode(body);
      return json;
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
      alldata = getarticledata();
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(
          title: Text("Articles"),
          backgroundColor: Colors.blue
          ,
        ),

        body:FutureBuilder(
          future: alldata,
          builder: (context,snapshot)
          {
            if(snapshot.hasData)
            {
              if(snapshot.data!.length<=0)
              {
                return Center(child: Text("No Articles"),);
              }
              else
              {
                return ListView.builder(
                    itemCount: snapshot.data!.length,
                    itemBuilder:  (context,index)
                    {
                      return GestureDetector(
                        onTap: () {
                          Navigator.of(context).push(
                              MaterialPageRoute(builder: (context)=>ViewArticleDetailsPage(id: snapshot.data![index]["architect_id"].toString(),
                                title:snapshot.data![index]["title"].toString(),
                                architect:snapshot.data![index]["name"].toString(),
                                refwed:snapshot.data![index]["ref_wed_url"].toString(),
                                des:snapshot.data![index]["description"].toString(),


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
                                // Text(snapshot.data![index]["cat_name"].toString()),
                                // Text(snapshot.data![index]["cat_icon"].toString()),
                                Container(
                                  width: MediaQuery.of(context).size.width,
                                  height: 250,

                                  child: Column(

                                    children:<Widget> [

                                      SizedBox(height: 10,width: 10,),
                                      Align(
                                        alignment: Alignment.topLeft,
                                        // child: Image.network(urlimg+snapshot.data![index]["cat_icon"].toString(),height: 20,width: 40,)

                                        child: Card(
                                            child: Container(
                                              alignment: Alignment.topLeft,
                                              height:150,
                                              width: MediaQuery.of(context).size.width,
                                              decoration: BoxDecoration(
                                                image: DecorationImage(
                                                  image: AssetImage("assets/images/article.png",),
                                                  fit: BoxFit.cover,
                                                ),
                                              ),
                                            )
                                          // backgroundImage: NetworkImage(urlimg+snapshot.data![index]["img_url"].toString(),),
                                        ),
                                      ),

                                      // SizedBox(height: 20,),
                                      Padding(
                                        padding: const EdgeInsets.all(8.0),
                                        child: Row(
                                          children: [

                                            Container(
                                              width: MediaQuery.of(context).size.width /1.10,
                                              // color: Colors.cyan,
                                              child:  Text(snapshot.data![index]["title"].toString(),
                                                maxLines: 4,
                                                style: TextStyle(

                                                  fontSize: 20,
                                                  fontWeight: FontWeight.bold,
                                                ),),
                                            )
                                          ],
                                        ),
                                      ),
                                      Padding(
                                        padding: const EdgeInsets.only(left: 8.0,top: 1.0),
                                        child: Row(
                                          children: [
                                            Text("Architect Name :-",style: TextStyle(
                                              fontSize: 20,
                                              // fontWeight: FontWeight.bold,
                                            ),),
                                            SizedBox(
                                              width: 10,
                                            ),

                                            Text(snapshot.data![index]["name"].toString(),style: TextStyle(
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
