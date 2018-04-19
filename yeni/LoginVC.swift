//
//  LoginVC.swift
//  yeni
//
//  Created by hatice kübra kılınç on 17.04.2018.
//  Copyright © 2018 hatice kübra kılınç. All rights reserved.
//
import Alamofire
import UIKit

class LoginVC: UIViewController {

    override func viewDidLoad() {
        super.viewDidLoad()

        // Do any additional setup after loading the view.
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }
    
       let URL_USER_LOGIN = "http://localhost/yeni/db/LoginX.php"
  
    @IBOutlet weak var usernameTXT: UITextField!
    @IBOutlet weak var passwordTXT: UITextField!
    @IBAction func LoginButton(_ sender: Any) {
        
        let parameters: Parameters=[
            "username":usernameTXT.text!,
            "password":passwordTXT.text!
            
            ]
        
        if ((self.usernameTXT.text?.isEmpty)! || (self.passwordTXT.text?.isEmpty)!  ){
            
            print("empty")
            
        }
        
        else{
            
            //Sending http post request
            Alamofire.request(URL_USER_LOGIN, method: .post, parameters: parameters).responseJSON
                {
                    response in
                    //printing response
                    
                    print(response)
                        }
                    
            }
            
            self.performSegue(withIdentifier: "LogintoHome", sender: self)
        
        
    }
    
    

}
