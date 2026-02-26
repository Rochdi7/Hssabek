"use client";

import Image from "next/image";
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs';

const ProductImage = () => { 
  return (
    <>
      <Tabs className='product-image'>
        <TabPanel>
          <Image src="/images/product-15.png" alt="product" width={370} height={365} />
        </TabPanel>
        
        <TabPanel>
          <Image src="/images/product-16.png" alt="product" width={370} height={365} />
        </TabPanel>

        <TabPanel>
          <Image src="/images/product-17.png" alt="product" width={370} height={365} />
        </TabPanel>

        <TabList>
          <Tab>
            <Image src="/images/product-15.png" alt="product" width={370} height={365} />
          </Tab>
          <Tab>
            <Image src="/images/product-16.png" alt="product" width={370} height={365} />
          </Tab>
          <Tab>
            <Image src="/images/product-17.png" alt="product" width={370} height={365} />
          </Tab>
        </TabList> 
      </Tabs>
    </>
  )
}

export default ProductImage;