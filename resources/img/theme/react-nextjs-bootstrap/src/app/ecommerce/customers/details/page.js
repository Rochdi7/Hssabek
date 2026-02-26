"use client";
 
import { Row, Col, Breadcrumb } from "react-bootstrap";
import TransactionsHistory from '@/components/eCommerce/Customers/Details/TransactionsHistory';
import Profile from '@/components/eCommerce/Customers/Details/Profile';

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">Customer Details</h3>
 
        <Breadcrumb className="breadcrumb-page-list align-items-center mb-0 lh-1">
          <Breadcrumb.Item href="/dashboard/ecommerce/">
            <div className="d-flex align-items-center text-decoration-none">
              <i className="ri-home-4-line fs-18 text-primary me-1"></i>
              <span className="text-secondary fw-medium hover">Dashboard</span>
            </div>
          </Breadcrumb.Item>

          <Breadcrumb.Item>
            <span className="fw-medium">eCommerce</span>
          </Breadcrumb.Item>

          <Breadcrumb.Item active>
            <span className="fw-medium">Customer Details</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>

      <Row>
        <Col md={12} lg={8} xxl={9}>
          <TransactionsHistory />
        </Col>

        <Col md={12} lg={4} xxl={3}>
          <Profile />
        </Col>
      </Row>
    </>
  );
}
