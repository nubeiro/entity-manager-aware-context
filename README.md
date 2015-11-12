Entity manager aware context
============================
This Behat extension provides a context with a registry of doctrine entity managers, so that you can access 
doctrine's entity managers by name from other contexts. 
 
## Setup
To use it, you need to add it to your behat.yml file: 

.. code-block:: yaml
    extensions:
      Nubeiro\EntityManagerAwareContext\Extension:
        dbal:
            connections:
                pbiz_users:
                    driver: pdo_mysql
                    host: localhost
                    dbname: blog
                    user: blog_user
                    password: blog_pass
                pbiz_datas:
                    driver: pdo_mysql
                    host: localhost
                    dbname: statistics
                    user: statistics_user
                    password: statistics_pass
        orm:
            entity_managers:
                blog:
                    connection: blog_user
                    mappings: [path1, path2]
                statistics:
                    connection: statistics
                    mappings: [path3, path4]


##Usage

Currently, the extension works only with YML mappings for doctrine. 


You can setup your suite to use also the EntityManagerContext:
.. code-block:: yaml
        default:
          path: %paths.base%/features
          contexts: [Nubeiro\EntityManagerAwareContext\Context\EntityManagerContext]

An then, you can use [Context communication](http://docs.behat.org/en/latest/cookbooks/context_communication.html)
to access entity manager context from your feature context. 

 
