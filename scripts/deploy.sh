az login --service-principal -u $AZURE_USERNAME -p $AZURE_PASSWORD --tenant $AZURE_TENANT_ID
az container create --resource-group MSAzure-ACIAKS-CICD-Demo --name CICD-Demo --image microsoft/aci-helloworld --dns-name-label aci-cicd-demo --ports 80