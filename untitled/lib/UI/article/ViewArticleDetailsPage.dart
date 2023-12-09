import 'package:flutter/material.dart';

class ViewArticleDetailsPage extends StatefulWidget {

  var id;
  var title;
  var architect;
  var refwed;
  var des;

  ViewArticleDetailsPage({Key? key,this.id,
    this.title,
    this.architect,
    this.refwed,
    this.des,

  }) : super(key: key);
  @override
  State<ViewArticleDetailsPage> createState() => _ViewArticleDetailsPageState();
}

class _ViewArticleDetailsPageState extends State<ViewArticleDetailsPage> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("Article Details"),
        backgroundColor: Colors.blue,
      ),
      body: SingleChildScrollView(
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

            SizedBox(height: 20,),
            Padding(
              padding: const EdgeInsets.all(8.0),
              child: Row(
                children: [


                  // Text(widget.title.toString(),style: TextStyle(
                  //   fontSize: 20,
                  //   fontWeight: FontWeight.bold,
                  // ),),

                  Container(
                    width: MediaQuery.of(context).size.width /1.10,
                    // color: Colors.cyan,

                    child:  Text(widget.title.toString(),style: TextStyle(
                      fontSize: 20,
                      fontWeight: FontWeight.bold,
                    ),),
                  )
                ],
              ),
            ),
            Padding(
              padding: const EdgeInsets.all(8.0),
              child: Row(
                children: [
                  Text("Architect Name :-",style: TextStyle(
                    fontSize: 20,
                    // fontWeight: FontWeight.bold,
                  ),),
                  SizedBox(
                    width: 10,
                  ),

                  Text(widget.architect,style: TextStyle(
                    fontSize: 20,
                    // fontWeight: FontWeight.bold,
                  ),)
                ],
              ),
            ),
            Padding(
              padding: const EdgeInsets.all(8.0),
              child: Row(
                children: [
                  Text("Reference Website :-",style: TextStyle(
                    fontSize: 20,
                    // fontWeight: FontWeight.bold,
                  ),),
                  SizedBox(
                    width: 10,
                  ),

                  Text(widget.refwed,style: TextStyle(
                    fontSize: 20,
                    // fontWeight: FontWeight.bold,
                  ),)
                ],
              ),
            ),
            Padding(
              padding: const EdgeInsets.all(8.0),
              child: Row(
                children: [
                  Text("Descripition :-",style: TextStyle(
                    fontSize: 20,
                    // fontWeight: FontWeight.bold,
                  ),),
                  SizedBox(
                    width: 10,
                  ),

                  Container(
                    width: MediaQuery.of(context).size.width /1.50,

                    child:  Text(widget.des,
                      maxLines: 4,
                      style: TextStyle(

                        fontSize: 20,
                        // fontWeight: FontWeight.bold,
                      ),),
                  )

                ],
              ),
            ),
            SizedBox(height: 20,),

            // Container(
            //   child: Row(
            //     children: [
            //       SizedBox(
            //         width: 100,
            //       ),
            //       SizedBox(
            //         width: 170,
            //         height: 60,
            //         child: GestureDetector(
            //           // onTap: () {
            //           //   Navigator.of(context).push(MaterialPageRoute(
            //           //       builder: (context) => ViewPortfolio()));
            //           // },
            //           child: Container(
            //
            //             decoration: BoxDecoration(
            //               color: Colors.black,
            //               borderRadius: BorderRadius.all(Radius.circular(10)),
            //             ),
            //             padding: EdgeInsets.only(top: 20),
            //             child: Text(
            //               "Comments",
            //               style: TextStyle(
            //                 color: Colors.white,
            //                 fontSize: 20,
            //               ),
            //               textAlign: TextAlign.center,
            //             ),
            //
            //
            //           ),
            //         ),
            //       ),
            //
            //     ],
            //   ),
            // )



          ],
        ),
      ),
    );
  }
}
