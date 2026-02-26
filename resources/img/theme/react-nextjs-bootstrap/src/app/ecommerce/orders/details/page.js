"use client";

import { Row, Col, Breadcrumb } from "react-bootstrap";
import TrackingID from '@/components/eCommerce/Orders/OrderDetails/TrackingID';
import RecentOrders from '@/components/eCommerce/Orders/OrderDetails/RecentOrders';
import OrderSummary from '@/components/eCommerce/Orders/OrderDetails/OrderSummary';
import BillingDetails from '@/components/eCommerce/Orders/OrderDetails/BillingDetails';
import ShippingDetails from '@/components/eCommerce/Orders/OrderDetails/ShippingDetails';
import DeliveryDetails from '@/components/eCommerce/Orders/OrderDetails/DeliveryDetails';

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">Order Details</h3>
 
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
            <span className="fw-medium">Orders</span>
          </Breadcrumb.Item>

          <Breadcrumb.Item active>
            <span className="fw-medium">Details</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>

      <Row>
        <Col lg={7} xxl={8}>
          <TrackingID />

          <RecentOrders />
        </Col>

        <Col lg={5} xxl={4}>
          <OrderSummary />
        </Col>
      </Row>

      <Row>
        <Col md={6} xl={6} xxl={4}>
          <BillingDetails />
        </Col>

        <Col md={6} xl={6} xxl={4}>
          <ShippingDetails />
        </Col>

        <Col md={6} xl={6} xxl={4}>
          <DeliveryDetails />
        </Col>
      </Row>
    </>
  );
}
