"use client";

import { Tab, Tabs } from "react-bootstrap";
import Description from './Description';
import Specification from './Specification';
import Reviews from './Reviews';

const ProductDescription = () => {
  return (
    <>
      <Tabs
        defaultActiveKey="description"
        id="uncontrolled-tab-example"
        className="border-0 bg-transparen review-tabs"
      >
        <Tab eventKey="description" title="Description">
          <Description />
        </Tab>

        <Tab eventKey="specification" title="Specification">
          <Specification />
        </Tab>

        <Tab eventKey="reviews" title="Reviews">
          <Reviews />
        </Tab>
      </Tabs>
    </>
  )
}

export default ProductDescription;