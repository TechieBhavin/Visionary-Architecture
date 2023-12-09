import 'package:flutter/material.dart';

class ViewPortfolioDetails extends StatefulWidget {

  var id;
  var ptitle;
  var about_us;
  var name;
  var start_date;
  var end_date;
  var video_url;

   ViewPortfolioDetails({Key? key,
     this.id,
     this.ptitle,
     this.about_us,
     this.name,
     this.start_date,
     this.end_date,
     this.video_url,


   }) : super(key: key);

  @override
  State<ViewPortfolioDetails> createState() => _ViewPortfolioDetailsState();
}

class _ViewPortfolioDetailsState extends State<ViewPortfolioDetails> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("Portfolio Details"),
        backgroundColor: Colors.blueGrey,
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
                        image: AssetImage("image/portfolio.png",),
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
                  Text(widget.ptitle.toString(),style: TextStyle(
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
                  Text("Description :-",style: TextStyle(
                    fontSize: 20,
                    // fontWeight: FontWeight.bold,
                  ),),
                  SizedBox(
                    width: 10,
                  ),

                  Text(widget.about_us,style: TextStyle(
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
                  Text("Architect name :-",style: TextStyle(
                    fontSize: 20,
                    // fontWeight: FontWeight.bold,
                  ),),
                  SizedBox(
                    width: 10,
                  ),

                  Text(widget.name,style: TextStyle(
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
                  Text("start date :-",style: TextStyle(
                    fontSize: 20,
                    // fontWeight: FontWeight.bold,
                  ),),
                  SizedBox(
                    width: 10,
                  ),

                  Text(widget.start_date,style: TextStyle(
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
                  Text("end date :-",style: TextStyle(
                    fontSize: 20,
                    // fontWeight: FontWeight.bold,
                  ),),
                  SizedBox(
                    width: 10,
                  ),

                  Text(widget.end_date,style: TextStyle(
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
                  Text("video URL :-",style: TextStyle(
                    fontSize: 20,
                    // fontWeight: FontWeight.bold,
                  ),),
                  SizedBox(
                    width: 10,
                  ),

                  Text(widget.video_url,style: TextStyle(
                    fontSize: 20,
                    // fontWeight: FontWeight.bold,
                  ),)

                ],
              ),
            ),

          ],
        ),
      ),
    );
  }
}
