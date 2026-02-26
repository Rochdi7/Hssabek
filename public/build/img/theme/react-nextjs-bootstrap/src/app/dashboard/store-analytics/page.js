import CustomerVisit from "@/components/Dashboard/StoreAnalytics/CustomerVisit";
import GrossRevenue from "@/components/Dashboard/StoreAnalytics/GrossRevenue";
import RecentSales from "@/components/Dashboard/StoreAnalytics/RecentSales";
import SalesByCategory from "@/components/Dashboard/StoreAnalytics/SalesByCategory";
import SalesByGender from "@/components/Dashboard/StoreAnalytics/SalesByGender";
import SalesThisMonth from "@/components/Dashboard/StoreAnalytics/SalesThisMonth";
import StockAlert from "@/components/Dashboard/StoreAnalytics/StockAlert";
import TopSellingProduct from "@/components/Dashboard/StoreAnalytics/TopSellingProduct";
import Welcome from "@/components/Dashboard/StoreAnalytics/Welcome";
import { Row, Col } from "react-bootstrap";

export default function Page() {
  return (
    <> 
      <Row>
        <Col xs={12} sm={12} md={12} lg={9} xl={9} xxl={9}>
          <Welcome />
        </Col>

        <Col xs={12} sm={12} md={12} lg={3} xl={3} xxl={3}>
          <CustomerVisit />
        </Col>
      </Row>

      <Row>
        <Col xs={12} sm={12} md={12} lg={4} xl={4} xxl={4}>
          <TopSellingProduct />
        </Col>

        <Col xs={12} sm={12} md={12} lg={8} xl={8} xxl={8}>
          <GrossRevenue />
        </Col>
      </Row>

      <Row>
        <Col xs={12} sm={12} md={12} lg={9} xl={9} xxl={9}>
          <RecentSales />
        </Col>

        <Col xs={12} sm={12} md={12} lg={3} xl={3} xxl={3}>
          <SalesByGender />

          <SalesThisMonth />
        </Col>
      </Row>

      <Row>
        <Col xs={12} sm={12} md={12} lg={4} xl={4} xxl={4}>
          <SalesByCategory />
        </Col>

        <Col xs={12} sm={12} md={12} lg={8} xl={8} xxl={8}>
          <StockAlert />
        </Col>
      </Row>
    </>
  );
}
