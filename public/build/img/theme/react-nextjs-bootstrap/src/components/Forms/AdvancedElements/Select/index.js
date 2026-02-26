"use client";

import { Row, Col, Card } from "react-bootstrap";
import DefaultSelect from './DefaultSelect';
import MultiTagsSelect from './MultiTagsSelect';

const Select = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Select</h4>
          
          <Row>
            <Col lg={6}>
              <DefaultSelect />
            </Col>

            <Col lg={6}>
              <MultiTagsSelect />
            </Col>
          </Row>
        </Card.Body>
      </Card>
    </>
  )
}

export default Select;