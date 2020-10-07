PImage webImg;
//String tokenUrl = "https://tecnomultimedia1.herokuapp.com/api/token-class";
String tokenUrl = "http://localhost:5000/api/token-class";
String qrCodeUrl = "http://colaboratorio3.org/_tps/assistance/qrcode.php?token=";
JSONObject tokenResponse;
int timeToDisplay = 0;
int timeForNextDisplay = 0;
// 0 = request
// 1 = display
// 2 = hide
int status = 0;

void setup() {
  size(300,300);
  surface.setAlwaysOnTop(false);
}

void draw() {
  background(0);
  
  switch(status){
    case 0:
      requestToken();
      break;
    case 1:
      if(validToken()){
        requestQRCode();
        showQRCode();
      }
      break;
    case 2:
      timeForNextDisplay--;
      if(timeForNextDisplay<=0){
        status = 0;
        timeForNextDisplay = 0;
      }
      break;
  }  
  
  
}

void requestToken(){
  if(tokenResponse == null && (timeForNextDisplay == 0)){
    tokenResponse = loadJSONObject(tokenUrl);
    timeForNextDisplay = tokenResponse.getInt("next");
    status = 1;
  }
}

boolean validToken(){
  return tokenResponse != null;
}

void requestQRCode(){
  if(webImg == null && validToken()){
    String token = tokenResponse.getString("token");
    webImg = loadImage(qrCodeUrl + token, "png");
    surface.setVisible(true);
    timeToDisplay = 600;
  }
}

void showQRCode(){
  image(webImg, 0, 0, 300, 300);
  timeToDisplay--;
  
  if(timeToDisplay<=0){
    reset();
  }
}

void reset(){
  timeToDisplay = 0;
  webImg = null;
  tokenResponse = null;
  surface.setVisible(false);
  status = 2;
}
