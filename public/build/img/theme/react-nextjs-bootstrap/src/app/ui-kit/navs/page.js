"use client";
    
import { Row, Col, Breadcrumb } from "react-bootstrap";   
import BasicNav from '@/components/UIKit/Navs/BasicNav';
import Alignment from '@/components/UIKit/Navs/Alignment';
import TabsDemo from '@/components/UIKit/Navs/TabsDemo';
import TabsPills from '@/components/UIKit/Navs/TabsPills';

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">Navs</h3>
 
        <Breadcrumb className="breadcrumb-page-list align-items-center mb-0 lh-1">
          <Breadcrumb.Item href="/dashboard/ecommerce/">
            <div className="d-flex align-items-center text-decoration-none">
              <i className="ri-home-4-line fs-18 text-primary me-1"></i>
              <span className="text-secondary fw-medium hover">Dashboard</span>
            </div>
          </Breadcrumb.Item>

          <Breadcrumb.Item>
            <span className="fw-medium">UI Elements</span>
          </Breadcrumb.Item>

          <Breadcrumb.Item active>
            <span className="fw-medium">Navs</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>
 
      <Row>
        <Col xxl={6}>
          <BasicNav />

          <TabsDemo />
        </Col>

        <Col xxl={6}>
          <Alignment />

          <TabsPills />
        </Col>
      </Row>
    </>
  );
}
