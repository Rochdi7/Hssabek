import { Row, Col } from "react-bootstrap";
import Welcome from '@/components/Dashboard/eCommerce/Welcome';
import TotalSales from '@/components/Dashboard/eCommerce/TotalSales';
import TotalOrders from '@/components/Dashboard/eCommerce/TotalOrders';
import TotalCustomers from '@/components/Dashboard/eCommerce/TotalCustomers';
import TotalRevenue from '@/components/Dashboard/eCommerce/TotalRevenue';
import SalesByLocations from '@/components/Dashboard/eCommerce/SalesByLocations';
import TopSellingProducts from '@/components/Dashboard/eCommerce/TopSellingProducts';
import RecentOrders from '@/components/Dashboard/eCommerce/RecentOrders';
import OrderSummary from '@/components/Dashboard/eCommerce/OrderSummary';
import RecentTransactions from '@/components/Dashboard/eCommerce/RecentTransactions';
import ReturningCustomerRate from '@/components/Dashboard/eCommerce/ReturningCustomerRate';

export default function Page() {
  return (
    <> 
      <Row>
        <Col xs={12} lg={8}>
          <Welcome />

          <TotalSales />
        </Col>

        <Col xs={12} lg={4}>
          <TotalOrders />

          <TotalCustomers />

          <TotalRevenue />
        </Col>
      </Row> 

      <Row>
        <Col xs={12} lg={12} xl={5}>
          <SalesByLocations />
        </Col>

        <Col xs={12} lg={12} xl={7}>
          <TopSellingProducts />
        </Col>
      </Row> 

      <Row>
        <Col xs={12} lg={12} xl={8}>
          <RecentOrders />
        </Col>

        <Col xs={12} lg={12} xl={4}>
          <OrderSummary />
        </Col>
      </Row>
      
      <Row>
        <Col xs={12} lg={4}>
          <RecentTransactions />
        </Col>

        <Col xs={12} lg={8}>
          <ReturningCustomerRate />
        </Col>
      </Row> 
    </>
  );
}
