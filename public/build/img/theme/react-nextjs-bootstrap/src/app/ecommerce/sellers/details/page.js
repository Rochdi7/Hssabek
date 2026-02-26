"use client";

import { Row, Col, Breadcrumb } from "react-bootstrap";
import SellerOverview from '@/components/eCommerce/Sellers/Details/SellerOverview';
import Profile from '@/components/eCommerce/Sellers/Details/Profile';
import Revenue from '@/components/eCommerce/Sellers/Details/Revenue';
import ProductsList from '@/components/eCommerce/ProductsList';

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">Seller Details</h3>
 
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
            <span className="fw-medium">Seller Details</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>

      <SellerOverview />

      <Row>
        <Col lg={4} xxl={3}>
          <Profile />
        </Col>

        <Col lg={8} xxl={9}>
          <Revenue />
        </Col>
      </Row>

      <ProductsList />
    </>
  );
}
