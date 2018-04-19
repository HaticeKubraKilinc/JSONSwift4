

import UIKit


struct login : Decodable {
    let username : String
    let password : String
    let email : String
    let fullname : String
}

class ViewController: UIViewController {
    
    var  users = [login]()
    
    override func viewDidLoad() {
        super.viewDidLoad()
        // Do any additional setup after loading the view, typically from a nib.
        
        let jsonURL = "http://localhost/login/serviceX.php"
        let url = URL(string: jsonURL)
        
        URLSession.shared.dataTask(with: url!) { (data, response, error) in
            
            do {
                
                self.users = try JSONDecoder().decode([login].self, from: data!)
                
                for eachUsers in self.users {
                    print(eachUsers.username + " : " + eachUsers.password + " : ", eachUsers.email + " : " + eachUsers.fullname)
                }
                
            }
            catch {
                print("Error")
            }
            
            
            }.resume()
    }
    

    
    
}
