//
//  RegisterVC.swift
//  yeni
//
//  Created by hatice kübra kılınç on 15.04.2018.
//  Copyright © 2018 hatice kübra kılınç. All rights reserved.
//
import Alamofire
import UIKit


class RegisterVC: UIViewController {

    override func viewDidLoad() {
        super.viewDidLoad()

   
    }
    

    @IBAction func herosButton(_ sender: Any) {
        self.performSegue(withIdentifier: "GotoHeros", sender: self)
    }
    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }
    
    let URL_USER_REGISTER = "http://localhost/yeni/db/RegisterX.php"
    @IBOutlet weak var usernameTXT: UITextField!
    @IBOutlet weak var passwordTXT: UITextField!
    @IBOutlet weak var emailTXT: UITextField!
    @IBOutlet weak var fullnameTXT: UITextField!
    

    
    @IBAction func LoginButton(_ sender: Any) {
        self.performSegue(withIdentifier: "loginSender", sender: self)
    }
    
    @IBAction func RegisterButton(_ sender: Any) {
        
        
        //creating parameters for the post request
        let parameters: Parameters=[
            "username":usernameTXT.text!,
            "password":passwordTXT.text!,
            "email":emailTXT.text!,
            "fullname":fullnameTXT.text!,
            
        ]
        
        if ((self.usernameTXT.text?.isEmpty)! || (self.passwordTXT.text?.isEmpty)! || (self.emailTXT.text?.isEmpty)! || (self.fullnameTXT.text?.isEmpty)! ){
            
            print("empty")
            
        }
        else{
            
            //Sending http post request
            Alamofire.request(URL_USER_REGISTER, method: .post, parameters: parameters).responseJSON
                {
                    response in
                    //printing response
                    
                    print(response)
                    
//
//                    //getting the json value from the server
//                    if let result = response.result.value {
//
//                    //converting it as NSDictionary
//                        let jsonData = result as! NSDictionary
//
//                        //displaying the message in label
//                        self.label.text = jsonData.value(forKey: "message") as! String?
//
//                    }
                    
            }
            
            self.performSegue(withIdentifier: "sender", sender: self)
            
            
        }
    
        
        
    }
    
    
    
}
