"use client";

import { Row, Col } from "react-bootstrap";
import PropertiesForSale from "./PropertiesForSale";
import PropertiesForRent from "./PropertiesForRent";

const PropertyStatus = () => {
  return (
    <>
      <h3 className="mb-3">Property Status</h3>

      <Row className="justify-content-center">
        <Col md={6} lg={6}>
          <PropertiesForSale />
        </Col>

        <Col md={6} lg={6}>
          <PropertiesForRent />
        </Col>
      </Row>
    </>
  );
};

export default PropertyStatus;
