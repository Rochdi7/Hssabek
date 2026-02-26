"use client";
  
import { Row, Col, Breadcrumb } from "react-bootstrap";
import AnnualProfit from '@/components/Crm/AnnualProfit';
import RevenueGrowth from '@/components/Crm/RevenueGrowth';
import LeadConversion from '@/components/Crm/LeadConversion';
import TotalOrders from '@/components/Crm/TotalOrders';
import LeadsTable from '@/components/Crm/LeadsTable';

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">Leads</h3>
 
        <Breadcrumb className="breadcrumb-page-list align-items-center mb-0 lh-1">
          <Breadcrumb.Item href="/dashboard/ecommerce/">
            <div className="d-flex align-items-center text-decoration-none">
              <i className="ri-home-4-line fs-18 text-primary me-1"></i>
              <span className="text-secondary fw-medium hover">Dashboard</span>
            </div>
          </Breadcrumb.Item>

          <Breadcrumb.Item>
            <span className="fw-medium">CRM</span>
          </Breadcrumb.Item>

          <Breadcrumb.Item active>
            <span className="fw-medium">Leads</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>

      <Row>
        <Col xs={12} sm={6} lg={6} xl={6} xxl={3}>
          <RevenueGrowth />
        </Col>

        <Col xs={12} sm={6} lg={6} xl={6} xxl={3}>
          <LeadConversion />
        </Col>

        <Col xs={12} sm={6} lg={6} xl={6} xxl={3}>
          <TotalOrders />
        </Col>

        <Col xs={12} sm={6} lg={6} xl={6} xxl={3}>
          <AnnualProfit />
        </Col>
      </Row> 

      <LeadsTable />
    </>
  );
}
