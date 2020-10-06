PImage webImg;
int pos = 0;

void setup() {
  size(300,300);
  String url = "http://colaboratorio3.org/_tps/assistance/qrcode.php";
  // Load image from a web server
  webImg = loadImage(url, "png");
  surface.setAlwaysOnTop(true);
}

void draw() {
  background(0);
  image(webImg, 0, 0, 300, 300);
  
  if(pos%600 == 0){
    surface.setVisible(true);
  }
  
  pos++;
}

void mousePressed(){
  pos = 1;
  surface.setVisible(false);
}
